<?php

use Core\Session;

$errors = [];

view('views/spreadsheet/create.view.php', [
    'title' => 'Spreadsheet Parser',
    'errors' => Session::get('errors'),
]);