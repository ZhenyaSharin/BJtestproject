<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controller;
use App\models\Tasks;
use App\core\middlewares\AuthMiddleware;
use App\core\Request;
use App\core\Response;


class AdminController extends Controller
{
    protected $tasks;

    public function __construct()
    {
        $this->adminMiddleware(new AuthMiddleware(['admin', 'changeTask', 'completeTask']));
    }

    public function admin()
    {
        $this->tasks = new Tasks;
        $tableData = $this->tasks->data();

        $params = [
            'table' => $tableData,
            'model' => $this->tasks
        ];

        return $this->render('admin', $params);
    }

    public function completeTask(Request $request, Response $response)
    {
        $this->tasks = new Tasks;
        if ($request->isPost()) {
            $data = $request->getBody();
            $this->tasks->loadData($data);
            if ($this->tasks->makeCompleted($this->tasks->id)) {
                Application::$app->session->setFlash('success', 'The task is marked as completed!');
                return $response->redirect('/admin');
            } 
        }
    }

    public function changeTask(Request $request, Response $response)
    {
        $this->tasks = new Tasks();
        if ($request->isPost()) {
            $data = $request->getBody();
            $this->tasks->loadData($data);
            if ($this->tasks->changeTextById($this->tasks)) {
                Application::$app->session->setFlash('success', 'The task has been changed successfully!');
                return $response->redirect('/admin'); 
            }
        }
    }
}