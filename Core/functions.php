<?php

declare(strict_types=1);

function dd(mixed $value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

// for active links
function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort(int $code = 404): void
{
    http_response_code($code);
    require basePath("views/{$code}.php");
    die();
}

// authorize user to view transactions that belong to only them
function authorize(bool $condition, int $status = Core\Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}

function makeSlug(string $value): string
{
    $value = preg_replace('![\s]+!u', '-', strtolower($value));
    $value = preg_replace('![_\s]+!u', '-', $value);
    return $value;
}

function basePath(string $path): string
{
    return BASE_PATH . $path;
}

// grab key value pairs from $attributes and make them available in the view
function view(string $path, array $attributes = []): void
{
    extract($attributes);

    require basePath($path);
}

function redirect(string $path): void
{
    header("location: {$path}");
    exit();
}

function old(string $key, string $default = ''): string
{
    return Core\Session::get('old')[$key] ?? $default;
}

function upload(string $target_dir, string $temp_name, string $path_filename_ext, string $filename): void
{
    mkdir($target_dir, 0777, TRUE);
    move_uploaded_file($temp_name, $path_filename_ext);
    $_SESSION['filename'] = $filename;
}

function swapItOut($deposit_type): string
{
    return match ($deposit_type) {
        'deposit' => 'deposit',
        'wire' => 'wire',
        'check' => 'check',
        'withdrawal' => 'withdrawal'
    };
}