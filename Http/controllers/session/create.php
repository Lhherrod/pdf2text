<?php

use Core\Session;

view('views/session/create.view.php', [
    'errors' => Session::get('errors'),
    'title' => 'Login Larrydev PDF & Number Cruncher'
]);