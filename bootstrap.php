<?php

$container = new \Core\Container();

$container->bind('Core\Database', function () {
    $config = require basePath('config.php');

    return  new Core\Database($config['database']);
});

\Core\App::setContainer($container);