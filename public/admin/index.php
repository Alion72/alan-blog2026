<?php
declare(strict_types=1);

require_once __DIR__ . '/_bootstrap.php';
require_admin();

$notice = '';
$error = '';
$confirmId = '';
$records = array_reverse(read_message_records());

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
  $action = (string)($_POST['action'] ?? '');
  $token = (string)($_POST['csrf_token'] ?? '');

  if (!csrf_valid($token)) {
    $error = 'La sesion ha caducado. Recarga la pagina e intentalo de nuevo.';
  } elseif ($action === 'confirm_delete') {
    $confirmId = (string)($_POST['id'] ?? '');
  } elseif ($action === 'delete') {
    $id = (string)($_POST['id'] ?? '');
    if ($id !== '' && delete_message_record($id)) {
      $notice = 'Comentario eliminado.';
      $records = array_reverse(read_message_records());
    } else {
      $error = 'No se pudo eliminar el comentario.';
    }
  }
}

$recordsById = [];
foreach ($records as $record) {
  $recordsById[$record['id']] = $record;
}
$confirmRecord = $confirmId !== '' && isset($recordsById[$confirmId]) ? $recordsById[$confirmId] : null;
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Alan Blog - Moderacion</title>
<style>
:root{--ink:#20252d;--muted:#69707a;--paper:#fffdf8;--line:#e7decf;--dark:#1f2521;--danger:#b42318;--dangerBg:#fff1f0;--ok:#176b4d}
*{box-sizing:border-box}body{margin:0;background:#f8f1e5;color:var(--ink);font-family:ui-rounded,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}
.wrap{width:min(1040px,92vw);margin:auto;padding:34px 0 60px}.top{display:flex;gap:18px;align-items:center;justify-content:space-between;margin-bottom:24px}
h1{margin:0;font:500 clamp(30px,6vw,46px)/1.05 Georgia,serif}.sub{margin:6px 0 0;color:var(--muted)}
.logout{border:1px solid var(--line);background:white;color:var(--ink);border-radius:999px;padding:11px 16px;font-weight:800;cursor:pointer}
.flash{margin:0 0 18px;padding:13px 15px;border-radius:12px;border:1px solid var(--line);background:white;font-weight:750}.flash.ok{color:var(--ok)}.flash.err{background:var(--dangerBg);color:var(--danger);border-color:#ffd7d3}
.confirm{margin:0 0 22px;padding:20px;background:white;border:1px solid #e9c7c2;border-radius:16px;box-shadow:0 12px 30px rgba(60,45,20,.08)}
.confirm h2{font:500 25px/1.1 Georgia,serif;margin:0 0 10px}.actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:16px}
.btn{border:0;border-radius:999px;padding:11px 15px;font-weight:850;cursor:pointer;text-decoration:none;display:inline-flex;background:var(--dark);color:white}.btn.danger{background:var(--danger)}.btn.light{background:#fff;border:1px solid var(--line);color:var(--ink)}
.grid{display:grid;gap:14px}.card{background:var(--paper);border:1px solid var(--line);border-radius:16px;padding:18px;box-shadow:0 10px 26px rgba(60,45,20,.07)}
.meta{display:flex;gap:10px;flex-wrap:wrap;color:var(--muted);font-size:13px;font-weight:700}.msg{font-family:Georgia,serif;font-size:19px;line-height:1.55;margin:13px 0 14px;white-space:pre-wrap}.by{font-weight:850}.empty{padding:28px;text-align:center;color:var(--muted);border:1px dashed #cbbd9d;border-radius:16px;background:#fffaf0}
@media(max-width:650px){.top{align-items:flex-start;flex-direction:column}.logout{width:100%}.card{padding:16px}.actions .btn{width:100%;justify-content:center}}
</style>
</head>
<body>
  <main class="wrap">
    <header class="top">
      <div>
        <h1>Alan Blog</h1>
        <p class="sub">Moderacion de recuerdos</p>
      </div>
      <form method="post" action="/admin/logout.php">
        <input type="hidden" name="csrf_token" value="<?= h(csrf_token()) ?>">
        <button class="logout" type="submit">Cerrar sesion</button>
      </form>
    </header>

    <?php if ($notice !== ''): ?><div class="flash ok"><?= h($notice) ?></div><?php endif; ?>
    <?php if ($error !== ''): ?><div class="flash err"><?= h($error) ?></div><?php endif; ?>

    <?php if ($confirmRecord): $d = $confirmRecord['data']; ?>
      <section class="confirm" aria-live="polite">
        <h2>Confirmar eliminacion</h2>
        <p>Vas a eliminar el recuerdo de <strong><?= h($d['name'] ?? '') ?></strong>. Esta accion no se puede deshacer.</p>
        <div class="actions">
          <form method="post" action="/admin/">
            <input type="hidden" name="csrf_token" value="<?= h(csrf_token()) ?>">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?= h($confirmRecord['id']) ?>">
            <button class="btn danger" type="submit">Eliminar definitivamente</button>
          </form>
          <a class="btn light" href="/admin/">Cancelar</a>
        </div>
      </section>
    <?php endif; ?>

    <section class="grid">
      <?php if (!$records): ?>
        <div class="empty">Todavia no hay comentarios.</div>
      <?php endif; ?>

      <?php foreach ($records as $record): $d = $record['data']; ?>
        <article class="card">
          <div class="meta">
            <span><?= h($d['ts'] ?? '') ?></span>
            <?php if (!empty($d['relationship'])): ?><span><?= h($d['relationship']) ?></span><?php endif; ?>
          </div>
          <p class="msg"><?= h($d['message'] ?? '') ?></p>
          <div class="by"><?= h($d['name'] ?? '') ?></div>
          <div class="actions">
            <form method="post" action="/admin/">
              <input type="hidden" name="csrf_token" value="<?= h(csrf_token()) ?>">
              <input type="hidden" name="action" value="confirm_delete">
              <input type="hidden" name="id" value="<?= h($record['id']) ?>">
              <button class="btn danger" type="submit">Eliminar</button>
            </form>
          </div>
        </article>
      <?php endforeach; ?>
    </section>
  </main>
</body>
</html>
