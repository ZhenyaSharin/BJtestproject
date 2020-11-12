<?php

namespace App\models;

use App\core\Model;


class Tasks extends Model
{
    // public int $id;
    public string $name;
    public string $email;
    public string $text;
    // public string $createdAt;
    // public string $removed;
    // public string $updated;
    // public string $completed;

    public function data()
    {
        echo "task data";
    }

    public function rules():array
    {
        return [
            // "id" => [self::RULE_REQUIRED],
            "name" => [self::RULE_REQUIRED],
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "text" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 255]],
            // "createdAt" => [self::RULE_REQUIRED]
        ];
    }
}