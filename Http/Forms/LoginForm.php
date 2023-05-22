<?php

declare(strict_types=1);

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function __construct(protected array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please provide a password of at least 10 characters.';
        }

        // if (!Validator::string($this->attributes['name'])) {
        //     $this->errors['name'] = 'Please provide a name of at least 5 characters';
        // }

        // return empty($this->errors);
    }

    public static function validate(array $attributes): self
    {
        $instance = new static($attributes);
        // if($instance->errors() === []) {
        //     dd('it is');
        // } else {
        //     dd('its not');
        // }
        return $instance->failed() ?  $instance->throw() : $instance;
    }

    public function throw()
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