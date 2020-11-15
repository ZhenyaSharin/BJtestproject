<?php

namespace App\models;

use App\core\Model;
use App\core\DbModel;


class User extends DbModel
{
    public string $login;
    public string $password;

    public function tableName(): string
    {
        return "Users";
    }

}