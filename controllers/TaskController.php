<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Application;
use App\core\Request;
use App\core\Response;
use App\models\Tasks;

class TaskController extends Controller
{
    public $task;
    public function index(Request $request, Response $response)
    {
        $this->task = new Tasks();

        $tableData = $this->task->data();

        $params = [
            'table' => $tableData,
            'model' => $this->task
        ];

        if ($request->isPost()) {
            $this->task->loadData($request->getBody());
            if (($this->task->validate()) && ($this->task->data())) {
                $this->task->addNewTask($request->getBody());
                $response->redirect('/');
                return; 
            } 
        }

        return $this->render('tasks', $params);
    }
}