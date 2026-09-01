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
```

`TELEGRAM_BOT_TOKEN` y `TELEGRAM_CHAT_ID` activan las notificaciones a Telegram. Si estan vacias, el sitio sigue funcionando y registra el aviso en `telegram_errors.log`.

`ALLOWED_ORIGIN` es opcional. Si se define, debe ser el origen permitido, por ejemplo `https://example.com`. Tambien acepta varios origenes separados por coma.

`STORAGE_PATH` indica donde se guardan los archivos generados en runtime. En produccion se recomienda `/data`.

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
