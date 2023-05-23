<?php

use App\Spreadsheet\Cruncher;

$router = new \Core\Router();
$cruncher = new Cruncher(basePath('example.xlsx'));
$results = $cruncher->start();

redirect($router->previousUrl());