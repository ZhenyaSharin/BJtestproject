<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Application;
use App\core\Request;


class TaskController extends Controller
{
    public function index()
    {
        $params = [
            'name' => 'Evgeniy Sharin'
        ];
        return $this->render('tasks', $params);
    }

    public function data(Request $request)
    {
        $body = $request->getBody();
        return "Some Fg Data";
    }
}