<?php

namespace App\core;

use App\core\Model;
use App\core\Application;

abstract class DbModel extends Model 
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    // public function save()
    // {
    //     $tableName = $this->tableName();
    //     $attributes = $this->attributes();

    //     // Application::$app->db->pdo;
    // }

    public function prepare($query)
    {
        return Application::$app->db->pdo->prepare($query);
    }

    public function findOne($data) //assoc
    {
        print_r($data);
        $tableName = static::tableName();
        $stmt = self::prepare('SELECT * FROM "LoginUser"(:login)');
        $stmt->bindValue(":login", $data['login']);
        $stmt->execute();
        $result = $stmt->fetchObject(static::class);
        echo "<pre>";
        var_dump($result);
        echo "</pre>";
        return $result;
    }
} 