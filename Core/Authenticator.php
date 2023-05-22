<?php

declare(strict_types=1);

namespace Core;

class Authenticator
{
    public function attempt($email, $password): bool
    {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $user['email'],
                    'name' => $user['name']
                ]);
                return true;
            }
        }
        return false;
    }

    public function login(array $user): void
    {

        $_SESSION['user'] = [
            'email' => $user['email'],
            'name' => $user['name']
        ];

        session_regenerate_id(true);
    }


    public function logout(): void
    {
        Session::destroy();
    }
}