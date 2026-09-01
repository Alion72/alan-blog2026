<?php
declare(strict_types=1);

function messages_log_dir(): string {
  $storagePath = getenv('STORAGE_PATH') ?: dirname(__DIR__, 2) . '/storage';
  $dir = rtrim($storagePath, '/\\') . '/logs';
  if (!is_dir($dir)) {
    @mkdir($dir, 0775, true);
  }
  return $dir;
}

function messages_file_path(): string {
  return messages_log_dir() . '/love_messages.ndjson';
}

function messages_lock_path(): string {
  return messages_log_dir() . '/love_messages.lock';
}

function message_record_id(int $index, string $line): string {
  return hash('sha256', $index . "\0" . $line);
}

function with_messages_lock(int $mode, callable $callback) {
  $lock = fopen(messages_lock_path(), 'c');
  if (!$lock) {
    return $callback();
  }

  try {
    flock($lock, $mode);
    return $callback();
  } finally {
    flock($lock, LOCK_UN);
    fclose($lock);
  }
}

function read_message_records(): array {
  return with_messages_lock(LOCK_SH, function (): array {
    $file = messages_file_path();
    if (!is_file($file)) return [];

    $lines = @file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
    $records = [];

    foreach ($lines as $index => $line) {
      $data = json_decode($line, true);
      if (!is_array($data)) continue;

      $records[] = [
        'id' => message_record_id($index, $line),
        'index' => $index,
        'data' => $data,
      ];
    }

    return $records;
  });
}

function append_message_record(array $row): bool {
  return with_messages_lock(LOCK_EX, function () use ($row): bool {
    $line = json_encode($row, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if ($line === false) return false;

    return @file_put_contents(messages_file_path(), $line . "\n", FILE_APPEND | LOCK_EX) !== false;
  });
}

function delete_message_record(string $id): bool {
  return with_messages_lock(LOCK_EX, function () use ($id): bool {
    $file = messages_file_path();
    if (!is_file($file)) return false;

    $lines = @file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
    $next = [];
    $deleted = false;

    foreach ($lines as $index => $line) {
      if (!$deleted && hash_equals(message_record_id($index, $line), $id)) {
        $deleted = true;
        continue;
      }
      $next[] = $line;
    }

    if (!$deleted) return false;

    $dir = dirname($file);
    $tmp = tempnam($dir, 'love_messages_');
    if ($tmp === false) return false;

    $contents = $next ? implode("\n", $next) . "\n" : '';
    if (@file_put_contents($tmp, $contents, LOCK_EX) === false) {
      @unlink($tmp);
      return false;
    }

    if (@rename($tmp, $file)) {
      return true;
    }

    @unlink($file);
    if (@rename($tmp, $file)) {
      return true;
    }

    @unlink($tmp);
    return false;
  });
}
