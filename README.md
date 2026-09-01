# Alan Blog

Proyecto PHP independiente para servir la landing/blog de Alan fuera de Keitaro.

La aplicacion mantiene la landing actual, sus carruseles, videos, formulario de mensajes, tracking interno y notificaciones opcionales a Telegram. No requiere base de datos en esta fase: los mensajes y logs se guardan como archivos en almacenamiento persistente.

## Estructura

```text
public/
  index.php
  view_event.php
  love_message.php
  health.php
  admin/
  assets/
storage/
  logs/
Dockerfile
```

Apache sirve `public/` como document root. `storage/` queda fuera de la carpeta publica.

## Variables de entorno

```text
TELEGRAM_BOT_TOKEN=
TELEGRAM_CHAT_ID=
ALLOWED_ORIGIN=
STORAGE_PATH=/data
ADMIN_USERNAME=
ADMIN_PASSWORD_HASH_B64=
ADMIN_PASSWORD_HASH=
```

`TELEGRAM_BOT_TOKEN` y `TELEGRAM_CHAT_ID` activan las notificaciones a Telegram. Si estan vacias, el sitio sigue funcionando y registra el aviso en `telegram_errors.log`.

`ALLOWED_ORIGIN` es opcional. Si se define, debe ser el origen permitido, por ejemplo `https://example.com`. Tambien acepta varios origenes separados por coma.

`STORAGE_PATH` indica donde se guardan los archivos generados en runtime. En produccion se recomienda `/data`.

`ADMIN_USERNAME` y `ADMIN_PASSWORD_HASH_B64` protegen el panel de moderacion en `/admin/`. `ADMIN_PASSWORD_HASH` se mantiene como fallback compatible.

Genera el hash con PHP usando:

```bash
php tools/hash_admin_password.php 'tu-contrasena'
```

Codifica el hash para Coolify con base64 antes de guardarlo en `ADMIN_PASSWORD_HASH_B64`. Asi evitas que caracteres como `$` sean interpretados por Docker/Coolify. No guardes la contrasena real en archivos versionados.

## Coolify

Usa Dockerfile Build Pack.

Monta almacenamiento persistente en:

```text
/data
```

El contenedor crea automaticamente `/data/logs` si no existe.

## Healthcheck

Endpoint:

```text
/health.php
```

Respuesta esperada:

```json
{"ok":true}
```

## Admin

Panel:

```text
/admin/
```

Permite iniciar sesion, listar recuerdos y eliminar comentarios mediante POST con proteccion CSRF. Los datos se leen desde `STORAGE_PATH/love_messages.ndjson`.
