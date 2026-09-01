<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/messages_store.php';

session_set_cookie_params([
  'httponly' => true,
  'samesite' => 'Lax',
  'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
]);
session_start();

function h($value): string {
  return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function admin_is_authenticated(): bool {
  return !empty($_SESSION['admin_authenticated']);
}

function require_admin(): void {
  if (admin_is_authenticated()) return;

  header('Location: /admin/login.php');
  exit;
}

function csrf_token(): string {
  if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  }
  return $_SESSION['csrf_token'];
}

function csrf_valid(?string $token): bool {
  return is_string($token) && isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function admin_configured(): bool {
  return (getenv('ADMIN_USERNAME') ?: '') !== '' && (getenv('ADMIN_PASSWORD_HASH') ?: '') !== '';
}

function admin_credentials_valid(string $username, string $password): bool {
  $expectedUsername = getenv('ADMIN_USERNAME') ?: '';
  $passwordHash = getenv('ADMIN_PASSWORD_HASH') ?: '';

  if ($expectedUsername === '' || $passwordHash === '') return false;
  if (!hash_equals($expectedUsername, $username)) return false;

  return password_verify($password, $passwordHash);
}
