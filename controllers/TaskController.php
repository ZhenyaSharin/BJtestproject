<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Application;
use App\core\Request;
use App\core\Response;
use App\models\Tasks;


class TaskController extends Controller
{
    public $tasks;

    public function index(Request $request, Response $response)
    {
        $this->tasks = new Tasks();

        $tableData = $this->tasks->data();

        $params = [
            'table' => $tableData,
            'model' => $this->tasks
        ];

        if ($request->isPost()) {
            $this->tasks->loadData($request->getBody());
            if (($this->tasks->validate()) && ($this->tasks->data())) {
                $this->tasks->addNewTask($request->getBody());
                Application::$app->session->setFlash('success', 'New task has been added successfully!');
                return $response->redirect('/');
            } 
        }

        return $this->render('tasks', $params);
    }
}