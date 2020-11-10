<?php

// echo "Hello World!";

require_once __DIR__.'/../vendor/autoload.php';

use App\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'tasks');

$app->router->get('/admin', 'admin');

$app->router->post('/taskget', function(){
    return "Some Fucking Data";
});

$app->run();
