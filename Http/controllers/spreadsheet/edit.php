<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$current_user_id = 11;

$excel_file = $db->query("select * from csv_files where id = :id", [
    'id' => $_GET['id']
])->findOrFail();

authorize($excel_file['user_id'] === $current_user_id);

view('views/spreadsheet/edit.view.php', [
    'title' => "Spreadsheet Parser Edit",
    'errors' => [],
    'file' => $excel_file,
]);