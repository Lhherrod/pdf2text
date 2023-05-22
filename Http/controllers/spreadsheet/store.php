<?php

use Core\FileAuthenticator;
use \Http\Forms\CreateSpreadSheetForm;

$form = CreateSpreadSheetForm::validate($attributes = [
    'file' => $_FILES['spreadsheet']
]);

$file_uplaod = (new FileAuthenticator())->attempt($attributes['user_id'], $attributes['file']);

if (!$file_uplaod) {
    $form->error('spreadsheet', 'Something went wrong, please try again.')
    ->throw();
}

redirect('/spreadsheet-files');