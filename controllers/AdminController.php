<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Tasks;
use App\core\middlewares\AuthMiddleware;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->adminMiddleware(new AuthMiddleware(['admin']));
    }

    public function admin()
    {
        $tasks = new Tasks();
        $tableData = $tasks->data();


        $params = [
            'table' => $tableData,
            'model' => $tasks
        ];

        return $this->render('admin', $params);
    }
}