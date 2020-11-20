<?php

namespace App\models;

use App\core\Model;
use App\core\DbModel;


class User extends DbModel
{
    public int $id = 0;
    public string $login = '';
    public string $password = '';
    public string $createdAt = '';


    public function primaryKey(): string
    {
        return "id";
    }


    public function rules():array
    {
        return [
            "login" => [self::RULE_REQUIRED],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 24]]
        ];
    }
}