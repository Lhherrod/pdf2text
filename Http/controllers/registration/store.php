<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a password of at least 10 characters.';
}

if (!empty($errors)) {
    return view('views/registration/create.view.php', [
        'errors' => $errors,
        'title' => 'Register'
    ]);
}


$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(email, name, password) VALUES(:email, :name, :password)', [
        'email' => $email,
        'name' => $name,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // Should be able to mimic logging in a user, to save code resueability
    // $signed_in = (new Authenticator())->attempt($attributes['email'], $attributes['password']);

    // old login logic
    // login([
    //     'email' => $email,
    //     'name' => $name
    // ]);

    header('location: /');
    exit();
}
