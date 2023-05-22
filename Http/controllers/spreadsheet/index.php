<?php

$db = \Core\App::resolve(\Core\Database::class);

$csv_files = $db->query("select * from csv_files where user_id = 11")->get();

view('views/spreadsheet/index.view.php', [
    'title' => 'Spreadsheet Files',
    'csv_files' => $csv_files
]);