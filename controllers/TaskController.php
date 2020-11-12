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
        $taskModel = new Tasks();


        if ($request->isPost()) {
            $taskModel->loadData($request->getBody());
            if (($taskModel->validate()) && ($taskModel->data())) {
                return 'Success';
            }
        }
        $params = [
            'model' => $taskModel
        ];
        return $this->render('tasks', $params);
    }

    public function data(Request $request)
    {
        $body = $request->getBody();
        return "Some Fg Data";
    }
}