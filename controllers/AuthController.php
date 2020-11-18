<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Request;
use App\core\Response;
use App\models\Login;


class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $loginModel = new Login();
        if ($request->isPost()) {
            $loginModel->loadData($request->getBody());
            if ($loginModel->validate() && $loginModel->login()) {
                $response->redirect('/');
                // Application::$app->session->setFlash("success", "You're logged in");
                return; 
            } 
        }

        // $this->setLayout('login');

        return $this->render('login', [
            'model' => $loginModel
        ]);
    }

    public function register(Request $request)
    {
        return $this->render('register');
    }
}