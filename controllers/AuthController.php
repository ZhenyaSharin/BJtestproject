<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Request;
use App\models\Login;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $loginModel = new Login();
        if ($request->isPost()) {
            $loginModel->loadData($request->getBody());
            if ($loginModel->validate() && $loginModel->logIn()) {
                return 'Success';
            } 
        }

        return $this->render('login', [
            'model' => $loginModel
        ]);
    }

    public function register(Request $request)
    {
        return $this->render('register');
    }
}