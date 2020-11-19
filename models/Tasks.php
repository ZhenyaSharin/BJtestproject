<?php

namespace App\models;

use App\core\Model;
use App\core\Application;
use App\core\exceptions\DatabaseException;

class Tasks extends Model
{
    public string $name = '';
    public string $email = '';
    public string $text = '';

    public function data()
    {
        try {
            $db = Application::$app->db;
            $stmt = $db->pdo->prepare('SELECT * FROM "GetAllTasks"()');
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            throw DatabaseException();
        }
    }

    public function addNewTask($data)
    {
        try {
            $db = Application::$app->db;
            $stmt = $db->pdo->prepare('SELECT * FROM "AddNewTask"(:name, :email, :txt)');
            $stmt->bindValue(":name", $data['name']);
            $stmt->bindValue(":email", $data['email']);
            $stmt->bindValue(":txt", $data['text']);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            throw new DatabaseException();
        }
    }

    public function rules():array
    {
        return [
            "name" => [self::RULE_REQUIRED],
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "text" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 255]]
        ];
    }
}