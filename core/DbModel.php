<?php

namespace App\core;

use App\core\Model;
use App\core\Application;

abstract class DbModel extends Model 
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        Application::$app->db
    }
} 