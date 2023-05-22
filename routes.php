<?php

$router->get('/', 'index.php');

$router->get('/spreadsheet-parser/create', 'spreadsheet/create.php');

$router->post('/spreadsheet-parser/create', 'spreadsheet/store.php');

$router->get('/spreadsheet-files', 'spreadsheet/index.php')->only('auth');

$router->get('/spreadsheet-file', 'spreadsheet/show.php');

$router->delete('/spreadsheet-file', 'spreadsheet/destroy.php');

$router->get('/spreadsheet-file/edit', 'spreadsheet/edit.php');

$router->patch('/spreadsheet-file', 'spreadsheet/update.php');

$router->get('/register', 'registration/create.php')->only('guest');

$router->post('/register', 'registration/store.php');

$router->get('/login', 'session/create.php')->only('guest');

$router->post('/session', 'session/store.php')->only('guest');

$router->delete('/session', 'session/destroy.php')->only('auth');