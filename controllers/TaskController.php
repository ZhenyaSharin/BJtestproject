<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Application;
use App\core\Request;
use App\models\Tasks;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $tasks = new Tasks();

        if ($request->isPost()) {
            $tasks->loadData($request->getBody());
            if (($tasks->validate()) && ($tasks->data())) {
                var_dump($tasks->data());
            } 
        }
        $tableData = $tasks->data();

        $params = [
            'table' => $tableData,
            'model' => $tasks
        ];

        return $this->render('tasks', $params);
    }

    public function data(Request $request)
    {
        $body = $request->getBody();
        return "Some Fg Data";
    }
}