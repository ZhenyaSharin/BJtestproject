<?php 

namespace App\core;

use App\core\middlewares\BaseMiddleware;

class Controller
{

    public string $layout = 'layout';
    public string $action = '';

    public array $middlewares = [];

    // public function setLayout($layout)
    // {
    //     $this->layout = $layout;
    // }


    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function AdminMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

}