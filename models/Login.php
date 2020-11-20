<?php

namespace App\models;

use App\core\Model;
use App\core\Application;
use App\models\User;


class Login extends Model
{
    public string $login = '';
    public string $password = '';

    public function login()
    {
        $user = User::findOne(['login' => $this->login]);
        if (!$user) {
            $this->addError("login", "User does not exist with this login");
            return false;
        } 
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect. Please, try again...');
            return false;
        }
        return Application::$app->login($user);
    }

    public function rules():array
    {
        return [
            "login" => [self::RULE_REQUIRED],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 2], [self::RULE_MAX, 'max' => 24]]
        ];
    }

}