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

        $success = '';

        $tableData = $this->task->data();

        if ($request->isPost()) {
            $this->task->loadData($request->getBody());
            if (($this->task->validate()) && ($this->task->data())) {
                $this->task->addNewTask($request->getBody());
                $success = 'success';
            } 
        }

        $params = [
            'table' => $tableData,
            'model' => $this->task,
            'status' => $success
        ];

        return $this->render('tasks', $params);
    }

    // public function data(Request $request)
    // {
    //     $body = $request->getBody();
    //     return "Some Fg Data";
    // }

    // public function newTask(Request $request, Response $response)
    // {
    //     $this->task = new Tasks;
    //     $data = $request->getBody();
    //     if ($request->isPost()) {
    //         $this->task->loadData($data);
    //         if ($this->task->validate() && $this->task->addNewTask($data)) {
    //             $response->redirect('/');
    //             return; 
    //         } 
    //     }
    //     $tableData = $this->task->data();

    //     $params = [
    //         'table' => $tableData,
    //         'model' => $this->task
    //     ];

    //     return $this->render('tasks', $params);
    // }
}