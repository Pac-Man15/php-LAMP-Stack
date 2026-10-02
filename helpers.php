<?php
declare(strict_types=1);

function config(string $key, $default = null)
{
    $value = $GLOBALS['config'] ?? [];
    foreach (explode('.', $key) as $part) {
        if (!is_array($value) || !array_key_exists($part, $value)) {
            return $default;
        }
        $value = $value[$part];
    }
    return $value;
}

/** Escape for HTML output. */
function e(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function url(string $path = '/'): string
{
    return rtrim((string) config('base_url', ''), '/') . $path;
}

/** Asset URL with a cache-busting mtime. */
function asset(string $path): string
{
    $file = APP_ROOT . '/public/assets/' . $path;
    $v = is_file($file) ? '?v=' . filemtime($file) : '';
    return url('/assets/' . $path) . $v;
}

function start_session(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params([
            'httponly' => true,
            'samesite' => 'Lax',
            'secure'   => !empty($_SERVER['HTTPS']),
        ]);
        session_start();
    }
}

function csrf_token(): string
{
    start_session();
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_valid(?string $token): bool
{
    start_session();
    return is_string($token) && !empty($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
}

function flash(?string $type = null, ?string $message = null): ?array
{
    start_session();
    if ($type !== null) {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
        return null;
    }
    $f = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $f;
}

/** Lazy PDO connection. Returns null if the database is unavailable. */
function db(): ?PDO
{
    static $pdo = false;
    if ($pdo === false) {
        $c = config('db');
        try {
            $pdo = new PDO(
                "mysql:host={$c['host']};dbname={$c['name']};charset={$c['charset']}",
                $c['user'],
                $c['pass'],
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]
            );
        } catch (Throwable $ex) {
            error_log('JABB db connect failed: ' . $ex->getMessage());
            $pdo = null;
        }
    }
    return $pdo;
}

function find_product(string $slug): ?array
{
    foreach (products() as $p) {
        if ($p['slug'] === $slug) {
            return $p;
        }
    }
    return null;
}

function not_found(): never
{
    http_response_code(404);
    require APP_ROOT . '/public/404.php';
    exit;
}
