<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Request;
use App\core\Response;
use App\models\Login;
use App\core\Application;


class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $login = new Login();
        if ($request->isPost()) {
            $login->loadData($request->getBody());
            if ($login->validate() && $login->login()) {
                $response->redirect('/admin');
                return; 
            } 

        }

        return $this->render('login', [
            'model' => $login
        ]);
    }



    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
}