<?php

declare(strict_types=1);

namespace Core;

class Validator
{
    public static function string(string $value, int $min = 10, int $max = 32): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function fileError(int $error): bool
    {
        return $error === 4;
    }

    public static function email(string $value): bool
    {   
        return filter_var($value, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    public static function fileCheck($file): bool
    {
        $file = $file['tmp_name'];

        $error = static::isValidMimeType($file);

        if ($error === false) {
            return true;
        } else {
            return false;
        }
    }

    public static function isValidMimeType($file): bool
    {
        $types = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        $type  = mime_content_type($file);

        if (in_array($type, $types)) {
            return false;
        }
        return true;
    }

    public static function fileExists(array $file): bool
    {
        $target_dir = "files/customers/" . makeSlug(pathinfo($file['name'])['filename']) . "/transactions/";
        $filename = makeSlug(pathinfo($file['name'])['filename']);
        $ext = pathinfo($file['name'])['extension'];
        $temp_name = $file['tmp_name'];
        $path_filename_ext = $target_dir . $filename . '-12345' . "." . $ext;
        
        if (file_exists($path_filename_ext)) {
            return false;
        } else {
            upload($target_dir, $temp_name, $path_filename_ext, $filename);
            return true;
        }
    }
}
