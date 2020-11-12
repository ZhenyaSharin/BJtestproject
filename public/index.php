<?php

// echo "Hello World!";

require_once __DIR__.'/../vendor/autoload.php';

use App\controllers\TaskController;
use App\controllers\AuthController;
use App\controllers\AdminController;
use App\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/tasks', [TaskController::class, 'index']);

$app->router->get('/login', [AuthController::class, 'login']);

$app->router->get('/admin', [AdminController::class, 'index']);

$app->router->post('/tasks', [TaskController::class, 'index']);

$app->router->post('/login', [AuthController::class, 'login']);

$app->run();
