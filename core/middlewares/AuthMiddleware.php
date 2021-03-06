<?php

namespace App\core\middlewares;

use App\core\middlewares\BaseMiddleware;
use App\core\exceptions\ForbiddenException;
use App\core\Application;


class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
                
            }
        }
    }
}