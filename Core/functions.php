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

function upload(array ...$file_attributes): void
{
    mkdir($file_attributes[0]['target_dir'], 0777, TRUE);
    move_uploaded_file($file_attributes[0]['temp_name'], $file_attributes[0]['path_filename_ext']);
    $_SESSION['filename'] = $file_attributes[0]['filename'];
}