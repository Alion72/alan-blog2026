<?php
/**
 * view_event.php
 *
 * Receives view, scroll, carousel and form events, stores runtime logs in
 * persistent storage, and sends Telegram notifications when configured.
 */

declare(strict_types=1);
date_default_timezone_set('Europe/Madrid');

$botToken = getenv('TELEGRAM_BOT_TOKEN') ?: '';
$chatId = getenv('TELEGRAM_CHAT_ID') ?: '';
$storagePath = getenv('STORAGE_PATH') ?: dirname(__DIR__) . '/storage';
$LOG_DIR = rtrim($storagePath, '/\\') . '/logs';
$THROTTLE_MIN = 0;
$allowedOrigin = trim((string)(getenv('ALLOWED_ORIGIN') ?: ''));

if (!is_dir($LOG_DIR)) {
  @mkdir($LOG_DIR, 0775, true);
}

function j($x) {
  return json_encode($x, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function log_line(string $file, string $line): void {
  @file_put_contents($GLOBALS['LOG_DIR'] . '/' . $file, $line, FILE_APPEND | LOCK_EX);
}

function enforce_allowed_origin(string $allowedOrigin): void {
  if ($allowedOrigin === '') return;

  $origin = $_SERVER['HTTP_ORIGIN'] ?? '';
  header('Vary: Origin');

  if ($origin === '') return;

  $allowed = array_filter(array_map('trim', explode(',', $allowedOrigin)));
  if (in_array($origin, $allowed, true)) {
    header('Access-Control-Allow-Origin: ' . $origin);
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    return;
  }

  http_response_code(403);
  echo 'forbidden';
  exit;
}

function tg_send(string $token, string $chatId, string $text): void {
  if ($token === '' || $chatId === '') {
    log_line('telegram_errors.log', date('c') . " | missing Telegram environment variables\n");
    return;
  }

  $ch = curl_init("https://api.telegram.org/bot{$token}/sendMessage");
  curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => [
      'chat_id' => $chatId,
      'text' => $text,
      'parse_mode' => 'HTML',
      'disable_web_page_preview' => true,
    ],
    CURLOPT_TIMEOUT => 10,
  ]);
  $res = curl_exec($ch);
  $err = curl_error($ch);
  $code = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  log_line('view.log', date('c') . " | TG {$code} | " . ($err ?: '-') . " | " . ($res ?: '-') . "\n");
  if ($err || $code < 200 || $code >= 300) {
    log_line('telegram_errors.log', date('c') . " | TG {$code} | " . ($err ?: '-') . " | " . ($res ?: '-') . "\n");
  }
}

function throttled(string $key, int $minutes): bool {
  if ($minutes <= 0) return false;

  $f = $GLOBALS['LOG_DIR'] . '/view_throttle.json';
  $now = time();
  $data = [];

  if (is_file($f)) {
    $raw = @file_get_contents($f);
    $data = $raw ? json_decode($raw, true) : [];
    if (!is_array($data)) $data = [];
  }

  foreach ($data as $k => $ts) {
    if ($ts < $now - $minutes * 60) unset($data[$k]);
  }

  if (isset($data[$key])) {
    @file_put_contents($f, j($data), LOCK_EX);
    return true;
  }

  $data[$key] = $now;
  @file_put_contents($f, j($data), LOCK_EX);
  return false;
}

function flag_emoji(?string $cc): string {
  if (!$cc) return '';

  $cc = strtoupper($cc);
  $emoji = '';
  for ($i = 0; $i < strlen($cc); $i++) {
    $emoji .= mb_chr(0x1F1E6 + (ord($cc[$i]) - 65), 'UTF-8');
  }
  return $emoji;
}

function is_public_ip(string $ip): bool {
  return filter_var(
    $ip,
    FILTER_VALIDATE_IP,
    FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
  ) !== false;
}

function getClientIp(): string {
  $candidateHeaders = [
    'HTTP_CF_CONNECTING_IP',
    'HTTP_X_FORWARDED_FOR',
    'HTTP_X_REAL_IP',
  ];

  foreach ($candidateHeaders as $header) {
    $value = $_SERVER[$header] ?? '';
    if ($value === '') continue;

    foreach (explode(',', $value) as $candidate) {
      $ip = trim($candidate);
      if ($ip !== '' && is_public_ip($ip)) {
        return $ip;
      }
    }
  }

  return trim((string)($_SERVER['REMOTE_ADDR'] ?? ''));
}

function geo_by_ip(string $ip): array {
  if ($ip === '' || filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
    return ['ok' => false];
  }

  $url = "http://ip-api.com/json/{$ip}?fields=status,country,countryCode,region,regionName,city,query";
  $ch = curl_init($url);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CONNECTTIMEOUT => 2,
    CURLOPT_TIMEOUT => 2,
  ]);
  $res = curl_exec($ch);
  curl_close($ch);

  if (!$res) return ['ok' => false];
  $data = json_decode($res, true);
  if (!is_array($data) || ($data['status'] ?? '') !== 'success') return ['ok' => false];

  return [
    'ok' => true,
    'country' => $data['country'] ?? '',
    'countryCode' => $data['countryCode'] ?? '',
    'region' => $data['regionName'] ?? '',
    'city' => $data['city'] ?? '',
  ];
}

function interest_badge(string $evt, string $label): string {
  if ($evt === 'view_content' && in_array($label, ['90s', '120s'], true)) return '🧲 <b>Muy interesado</b>';
  if ($evt === 'view_content' && in_array($label, ['30s', '60s'], true)) return '🔥 <b>Interesado</b>';
  if (in_array($evt, ['scroll_90', 'cta_click'], true)) return '💛 <b>Interacción profunda</b>';
  if (in_array($evt, ['scroll_50', 'scroll_75', 'form_focus', 'carousel_interaction'], true)) return '✨ <b>Interactuó con el blog</b>';
  return '';
}

function pretty_event_title(string $evt, string $label): string {
  $map = [
    'view_content' => 'ViewContent',
    'scroll_25' => 'Scroll 25%',
    'scroll_50' => 'Scroll 50%',
    'scroll_75' => 'Scroll 75%',
    'scroll_90' => 'Scroll 90%',
    'carousel_interaction' => 'Carrusel',
    'pool_carousel' => 'Carrusel piscina',
    'form_focus' => 'Formulario de cariño',
    'cta_click' => 'Mensaje de cariño enviado',
    'love_message' => 'Muestra de cariño para Alan',
    'form_error' => 'Error de formulario',
  ];

  if ($evt === 'view_content' && $label) return "ViewContent {$label}";
  return $map[$evt] ?? strtoupper(str_replace('_', ' ', $evt));
}

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$ip = getClientIp();
$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';

enforce_allowed_origin($allowedOrigin);
if ($method === 'OPTIONS') {
  http_response_code(204);
  exit;
}

$payload = null;

if ($method === 'POST') {
  $raw = file_get_contents('php://input');
  $payload = $raw ? json_decode($raw, true) : null;
} else {
  $payload = [
    'event' => $_GET['event'] ?? 'view_content',
    'label' => $_GET['label'] ?? '',
    'url' => $_GET['url'] ?? '',
    'referrer' => $_GET['referrer'] ?? '',
    'ts' => $_GET['ts'] ?? date('c'),
    'ua' => $_GET['ua'] ?? $ua,
    'clickid' => $_GET['clickid'] ?? '',
    'subid' => $_GET['subid'] ?? '',
    'pixel' => $_GET['pixel'] ?? '',
    'fbclid' => $_GET['fbclid'] ?? '',
    'utm_source' => $_GET['utm_source'] ?? '',
    'utm_medium' => $_GET['utm_medium'] ?? '',
    'utm_campaign' => $_GET['utm_campaign'] ?? '',
    'utm_content' => $_GET['utm_content'] ?? '',
    'utm_term' => $_GET['utm_term'] ?? '',
  ];
}

if (!$payload || !is_array($payload)) {
  http_response_code(400);
  echo 'no payload';
  exit;
}

$event = trim((string)($payload['event'] ?? 'view_content'));
$label = trim((string)($payload['label'] ?? '0s'));
$url = trim((string)($payload['url'] ?? ''));
$ref = trim((string)($payload['referrer'] ?? ''));
$ts = trim((string)($payload['ts'] ?? date('c')));
$ua_in = trim((string)($payload['ua'] ?? $ua));
$clickid = trim((string)($payload['clickid'] ?? ($payload['subid'] ?? '')));
$pixel = trim((string)($payload['pixel'] ?? ''));
$fbclid = trim((string)($payload['fbclid'] ?? ''));
$utm_src = trim((string)($payload['utm_source'] ?? ''));
$utm_med = trim((string)($payload['utm_medium'] ?? ''));
$utm_cmp = trim((string)($payload['utm_campaign'] ?? ''));
$utm_cnt = trim((string)($payload['utm_content'] ?? ''));
$utm_trm = trim((string)($payload['utm_term'] ?? ''));
$name_love = trim((string)($payload['name'] ?? ''));
$relationship_love = trim((string)($payload['relationship'] ?? ''));
$message_love = trim((string)($payload['message'] ?? ''));

$thrKey = hash('sha256', ($ip ?: '-') . '|' . ($ua_in ?: '-') . '|' . ($url ?: '-') . '|' . $event . '|' . $label);
if ($THROTTLE_MIN > 0 && throttled($thrKey, $THROTTLE_MIN)) {
  http_response_code(204);
  exit;
}

log_line(
  'view.log',
  date('c') . " | {$event} {$label} | {$ip} | {$url} | ref={$ref} | clickid={$clickid} | pixel={$pixel} | fbclid={$fbclid} | utm={$utm_src}/{$utm_med}/{$utm_cmp}/{$utm_cnt}/{$utm_trm}\n"
);

$geo = geo_by_ip($ip);
$geo_s = 'Ubicación no disponible';
if ($geo['ok'] ?? false) {
  $flag = flag_emoji($geo['countryCode'] ?? '');
  $parts = array_filter([$geo['city'] ?? '', $geo['region'] ?? '', $geo['country'] ?? '']);
  $geo_s = ($flag ? $flag . ' ' : '') . implode(', ', $parts);
}

$title = pretty_event_title($event, $label);
$badge = interest_badge($event, $label);

$msg = "👁️ <b>" . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . "</b>\n";
if ($badge) $msg .= $badge . "\n";
$msg .= "🌐 <b>URL:</b> " . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . "\n";
if ($ref !== '') $msg .= "↩️ <b>Referrer:</b> " . htmlspecialchars($ref, ENT_QUOTES, 'UTF-8') . "\n";
if ($clickid !== '') $msg .= "🔗 <b>ClickID:</b> " . htmlspecialchars($clickid, ENT_QUOTES, 'UTF-8') . "\n";
if ($pixel !== '') $msg .= "🎯 <b>Pixel:</b> " . htmlspecialchars($pixel, ENT_QUOTES, 'UTF-8') . "\n";
if ($fbclid !== '') $msg .= "🧩 <b>fbclid:</b> " . htmlspecialchars($fbclid, ENT_QUOTES, 'UTF-8') . "\n";
if ($utm_src . $utm_med . $utm_cmp . $utm_cnt . $utm_trm !== '') {
  $msg .= "🏷️ <b>UTM:</b> " . htmlspecialchars("$utm_src / $utm_med / $utm_cmp / $utm_cnt / $utm_trm", ENT_QUOTES, 'UTF-8') . "\n";
}
$msg .= "🕒 <b>Hora:</b> " . htmlspecialchars($ts, ENT_QUOTES, 'UTF-8') . "\n";
$msg .= "🧭 <b>IP:</b> " . htmlspecialchars($ip, ENT_QUOTES, 'UTF-8') . "\n";
$msg .= "🌎 <b>Ubicación:</b> " . htmlspecialchars($geo_s, ENT_QUOTES, 'UTF-8') . "\n";
$msg .= "🧾 <b>User-Agent:</b> " . htmlspecialchars($ua_in, ENT_QUOTES, 'UTF-8');

if ($event === 'love_message') {
  $msg .= "\n\n👤 <b>Nombre:</b> " . htmlspecialchars($name_love !== '' ? $name_love : 'No indicado', ENT_QUOTES, 'UTF-8');
  $msg .= "\n🤍 <b>Relación:</b> " . htmlspecialchars($relationship_love !== '' ? $relationship_love : 'No indicada', ENT_QUOTES, 'UTF-8');
  $msg .= "\n💌 <b>Mensaje:</b> " . htmlspecialchars($message_love !== '' ? $message_love : 'Sin mensaje', ENT_QUOTES, 'UTF-8');
}

$extras = [];
foreach (['scroll', 'duration', 'field', 'item'] as $k) {
  if (!empty($payload[$k])) $extras[] = $k . ': ' . $payload[$k];
}
if (!empty($extras)) {
  $msg .= "\n➕ <b>Extra:</b> " . htmlspecialchars(implode(' | ', $extras), ENT_QUOTES, 'UTF-8');
}

tg_send($botToken, $chatId, $msg);

http_response_code(204);
