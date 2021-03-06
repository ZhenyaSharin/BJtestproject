<?php

use App\controllers\TaskController;
use App\controllers\AuthController;
use App\controllers\AdminController;
use App\core\Application;

require_once __DIR__.'/../vendor/autoload.php';

error_reporting(E_ALL ^ E_DEPRECATED);

// $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
// $dotenv->load();

// 
require_once __DIR__.'/../config/config.php';

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [TaskController::class, 'index']);

$app->router->get('/login', [AuthController::class, 'login']);

$app->router->get('/admin', [AdminController::class, 'admin']);

$app->router->post('/tasks', [TaskController::class, 'index']);

$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->post('/', [TaskController::class, 'index']);

$app->router->post('/completetask', [AdminController::class, 'completeTask']);

$app->router->post('/changetask', [AdminController::class, 'changeTask']);

$app->run();
