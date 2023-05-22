<?php

$db = \Core\App::resolve(\Core\Database::class);

$current_user_id = 11;

$excel_file = $db->query("select * from csv_files where id = :id", [
    'id' => $_POST['id']
])->findOrFail();

authorize($excel_file['user_id'] === $current_user_id);

$db->query('delete from csv_files where id = :id', [
    'id' => $_POST['id']
]);

header('location: /spreadsheet-files');
die();