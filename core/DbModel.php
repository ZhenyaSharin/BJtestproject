<?php

namespace App\core;

use App\core\Model;
use App\core\Application;

abstract class DbModel extends Model 
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

    public function prepare($query)
    {
        return Application::$app->db->pdo->prepare($query);
    }

    public function findOne($data) //assoc
    {
        // $tableName = static::tableName();
        if (array_key_exists('login', $data)) {
            $stmt = self::prepare('SELECT * FROM "LoginUser"(:login)');
            $stmt->bindValue(":login", $data['login']);
                    $stmt->execute();
        $result = $stmt->fetchObject(static::class);
        } else {
            $stmt = self::prepare('SELECT * FROM "GetUserById"(:id)');
            $stmt->bindValue(":id", $data['id']);
                    $stmt->execute();
        $result = $stmt->fetchObject(static::class);
        }
        return $result;
    }
} 