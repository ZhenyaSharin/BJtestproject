<?php

namespace App\models;

use App\core\Model;


class Login extends Model
{
    public string $login;
    public string $password;

    public function logIn()
    {
        echo "New logging in";
    }

    public function rules():array
    {
        return [
            "login" => [self::RULE_REQUIRED],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 24]]
        ];
    }
}