<?php 

namespace App\core;

use App\core\Router;
use App\core\Request;
use App\core\Response;
use App\core\Controller;
use App\core\Database;
use App\core\Session;
use App\core\DbModel;
use App\core\View;

class Application
{
    public static string $ROOT_DIR;

    public string $layout = 'layout';
    public string $userClass;
    public $router;
    public $request;
    public $response;
    public $session;
    public $db;
    public ?DbModel $user;
    public $view;

    public static $app;
    public ?Controller $controller = null;


    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->view = new View();

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('layouts/_error', [
                'exception' => $e
            ]);
        }
    }
}