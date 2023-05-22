<?php

$title = 'Spreadsheet File ' . $_GET['id'];

$db = \Core\App::resolve(\Core\Database::class);

$current_user_id = 11;

$excel_file = $db->query("select * from csv_files where id = :id", [
    'id' => $_GET['id']
])->findOrFail();

authorize($excel_file['user_id'] === $current_user_id);

require(basePath('views/spreadsheet/show.view.php'));