<?php

$db = \Core\App::resolve(\Core\Database::class);

$current_user_id = 11;

$excel_file = $db->query("select * from csv_files where id = :id", [
    'id' => $_POST['id']
])->findOrFail();

authorize($excel_file['user_id'] === $current_user_id);

$errors = [];

if (!\Core\Validator::string($_POST['name'])) {
    $errors['spreadsheet'] = 'The name must be at least 10 characters but no more than 32 characters long.';
}

if (count($errors)) {
    return view('views/spreadsheet/edit.view.php', [
        'heading' => 'Edit File',
        'errors' => $errors,
        'file' => $excel_file,
        'title' => "Spreadsheet Parser Edit",
    ]);
}

$db->query('update csv_files set name = :name where id = :id', [
    'id' => $_POST['id'],
    'name' => $_POST['name']
]);

header('location: /spreadsheet-files');
die();