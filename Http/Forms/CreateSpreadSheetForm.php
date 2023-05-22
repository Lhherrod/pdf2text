<?php

declare(strict_types=1);

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class CreateSpreadSheetForm
{
    protected array $errors = [];
    protected string $filename;

    public function __construct(protected array $attributes)
    {
        if (Validator::fileError($attributes['file']['error'])) {
            return $this->errors['spreadsheet'][] = 'Please upload a file.';
        }

        if (!Validator::fileCheck($attributes['file'])) {
            $this->errors['spreadsheet'][] = 'Error: Only ' . 'Excel Files' . ' are allowed';
        }

        if (!Validator::string($attributes['file']['name'])) {
            $this->errors['spreadsheet'][] = 'The filename must be at least 10 characters but no more than 32 characters long.';
        }

        if (!Validator::fileExists($attributes['file'])) {
            $this->errors['spreadsheet'][] = 'Sorry, this file already exists.';
        }
    }

    public static function validate(array $attributes): self
    {
        $instance = new static($attributes);

        return $instance->failed() ?  $instance->throw() : $instance;
    }

    public function throw(): void
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(): int
    {
        return count($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message): self
    {
        $this->errors[$field] = $message;

        return $this;
    }
}