<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Tasks;


class AdminController extends Controller
{
    public function index()
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