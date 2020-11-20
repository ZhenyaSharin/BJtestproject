<?php

namespace App\models;

use App\core\Model;
use App\core\Application;
use App\core\exceptions\DatabaseException;

class Tasks extends Model
{
    public int $id;
    public string $name = '';
    public string $email = '';
    public string $text = '';

    public function data()
    {
        try {
            $db = Application::$app->db;
            $db->pdo->beginTransaction();
            $stmt = $db->pdo->prepare('SELECT * FROM "GetAllTasks"()');
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $db->pdo->commit();
            return $result;
        } catch (PDOException $e) {
            throw DatabaseException();
        }
    }

    public function addNewTask($data)
    {
        try {
            $db = Application::$app->db;
            $db->pdo->beginTransaction();
            $stmt = $db->pdo->prepare('SELECT * FROM "AddNewTask"(:name, :email, :txt)');
            $stmt->bindValue(":name", $data['name'], \PDO::PARAM_STR);
            $stmt->bindValue(":email", $data['email'], \PDO::PARAM_STR);
            $stmt->bindValue(":txt", $data['text'], \PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            $db->pdo->commit();
            if (!empty($result)) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            throw new DatabaseException();
        }
    }

    public function makeCompleted($id)
    {
        try {
            $db = Application::$app->db;
            $db->pdo->beginTransaction();
            $stmt = $db->pdo->prepare('SELECT * FROM "MakeTaskCompleted"(:taskid)');
            $stmt->bindValue(":taskid", $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            $db->pdo->commit();
            if (!empty($result)) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            throw new DatabaseException();
        }
    }


    public function changeTextById($task)
    {
        try {
            $db = Application::$app->db;
            $db->pdo->beginTransaction();
            $stmt = $db->pdo->prepare('SELECT * FROM "UpdateTaskText"(:taskid, :txt)');
            $stmt->bindValue(":taskid", $task->id, \PDO::PARAM_INT);
            $stmt->bindValue(":txt", $task->text, \PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            $db->pdo->commit();
            if (!empty($result)) {
                return true;
            }
            return false;
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