<?php 

namespace App\core;

use App\core\Router;
use App\core\Request;
use App\core\Response;
use App\core\Controller;

class Application
{
    public static string $ROOT_DIR;
    public $router;
    public $request;
    public $response;
    public static $app;
    public $controller;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
}