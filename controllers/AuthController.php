<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Request;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isPost()) {
            return "Some fucking data";
        }
        return $this->render('login');
    }

    public function register(Request $request)
    {
        return $this->render('register');
    }
}