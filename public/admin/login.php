<?php
declare(strict_types=1);

require_once __DIR__ . '/_bootstrap.php';

if (admin_is_authenticated()) {
  header('Location: /admin/');
  exit;
}

$error = '';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
  $username = trim((string)($_POST['username'] ?? ''));
  $password = (string)($_POST['password'] ?? '');

  if (!admin_configured()) {
    $error = 'El acceso admin no esta configurado.';
  } elseif (admin_credentials_valid($username, $password)) {
    session_regenerate_id(true);
    $_SESSION['admin_authenticated'] = true;
    csrf_token();
    header('Location: /admin/');
    exit;
  } else {
    $error = 'Usuario o contrasena incorrectos.';
  }
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Alan Blog - Admin</title>
<style>
:root{--ink:#20252d;--muted:#69707a;--paper:#fffdf8;--line:#e7decf;--dark:#1f2521;--danger:#b42318}
*{box-sizing:border-box}body{margin:0;min-height:100svh;display:grid;place-items:center;background:#f8f1e5;color:var(--ink);font-family:ui-rounded,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}
.login{width:min(420px,92vw);background:var(--paper);border:1px solid var(--line);border-radius:18px;padding:30px;box-shadow:0 18px 45px rgba(60,45,20,.12)}
h1{margin:0 0 4px;font:500 34px/1.05 Georgia,serif}.sub{margin:0 0 24px;color:var(--muted)}
.field{display:grid;gap:7px;margin:15px 0}label{font-size:13px;font-weight:800}input{width:100%;border:1px solid var(--line);border-radius:12px;padding:13px 14px;font:inherit;background:white}
button{width:100%;border:0;border-radius:999px;padding:14px 18px;margin-top:16px;background:var(--dark);color:#fff;font:800 15px/1 sans-serif;cursor:pointer}
.error{margin:0 0 18px;padding:12px 14px;border-radius:12px;background:#fff1f0;color:var(--danger);border:1px solid #ffd7d3;font-weight:700}
</style>
</head>
<body>
  <main class="login">
    <h1>Alan Blog</h1>
    <p class="sub">Moderacion de recuerdos</p>
    <?php if ($error !== ''): ?><div class="error"><?= h($error) ?></div><?php endif; ?>
    <form method="post" action="/admin/login.php">
      <div class="field">
        <label for="username">Usuario</label>
        <input id="username" name="username" autocomplete="username" required>
      </div>
      <div class="field">
        <label for="password">Contrasena</label>
        <input id="password" name="password" type="password" autocomplete="current-password" required>
      </div>
      <button type="submit">Entrar</button>
    </form>
  </main>
</body>
</html>
