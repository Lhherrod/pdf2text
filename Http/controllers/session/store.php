<?php

declare(strict_types=1);

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$signed_in = (new Authenticator())->attempt($attributes['email'], $attributes['password']);

if (!$signed_in) {
    $form->error('email', 'This information does not match our records...')
    ->throw();
}

redirect('/');