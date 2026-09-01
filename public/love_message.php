<?php
declare(strict_types=1);
date_default_timezone_set('Atlantic/Canary');
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/includes/messages_store.php';

$LOVE_FILE = messages_file_path();
$allowedOrigin = trim((string)(getenv('ALLOWED_ORIGIN') ?: ''));

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
  echo json_encode(['ok' => false, 'error' => 'forbidden'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  exit;
}

function c($v, int $n): string {
  return mb_substr(trim((string)$v), 0, $n);
}

enforce_allowed_origin($allowedOrigin);

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
  http_response_code(204);
  exit;
}

if (($_GET['action'] ?? '') === 'list') {
  $items = [];

  foreach (array_slice(read_message_records(), -100) as $record) {
    $r = $record['data'];
    $items[] = [
      'name' => (string)($r['name'] ?? ''),
      'relationship' => (string)($r['relationship'] ?? ''),
      'message' => (string)($r['message'] ?? ''),
      'ts' => (string)($r['ts'] ?? ''),
    ];
  }

  $items = array_reverse($items);
  echo json_encode(['ok' => true, 'messages' => $items], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  exit;
}

$name = c($_POST['name'] ?? '', 80);
$rel = c($_POST['relationship'] ?? '', 80);
$message = c($_POST['message'] ?? '', 1200);
$url = c($_POST['landing_url'] ?? '', 500);

if ($name === '' || $message === '') {
  http_response_code(422);
  echo json_encode(['ok' => false, 'error' => 'Faltan datos'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  exit;
}

$row = [
  'ts' => date('c'),
  'name' => $name,
  'relationship' => $rel,
  'message' => $message,
  'url' => $url,
  'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
  'ua' => $_SERVER['HTTP_USER_AGENT'] ?? '',
];

append_message_record($row);

echo json_encode([
  'ok' => true,
  'stored' => true,
  'public_message' => [
    'name' => $name,
    'relationship' => $rel,
    'message' => $message,
    'ts' => $row['ts'],
  ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
