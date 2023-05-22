<?php

declare(strict_types=1);

namespace Core;

class FileAuthenticator
{
    public function attempt(): bool
    {
        $user = App::resolve(Database::class)->query('select id from users where email = :email', [
            'email' => $_SESSION['user']['email']
        ])->find();

        if ($user) {
            App::resolve(Database::class)->query("INSERT INTO csv_files (name, user_id) VALUES(:name, :user_id)", [
                'name' => $_SESSION['filename'],
                'user_id' => 11
            ]);
            unset($_SESSION['filename']);
            return true;
        }
        return false;
    }
}