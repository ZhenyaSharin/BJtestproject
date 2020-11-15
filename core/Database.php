<?php

namespace App\core;

use App\core\Application;

class Database
{
    public $pdo;

    public function __construct(array $config)
    {
        // $dsn = $config['dsn'] ?? '';
        $connection = $config['connection'] ?? '';
        $host = $config['host'] ?? '';
        $port = $config['port'] ?? '';
        $name = $config['name'] ?? '';

        $dsn = $config['dsn'] ?? '';
        $dsn = $config['dsn'] ?? '';

        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $dsn = "$connection:host=$host;port=$port;dbname=$name";
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $files = scandir(Application::$ROOT_DIR.'/migrations');

        $toApplyMigrations = array_diff($files, $appliedMigrations);
        foreach ($toApplyMigrations as $value) {
            if ($value == '.' || $value == '..') {
                continue;
            }
            require_once Application::$ROOT_DIR.'/migrations/'.$value;
            $className = pathinfo($value, PATHINFO_FILENAME);
            $instance = new $className();
            $this->log("applying migration $value".PHP_EOL);
            $instance->up();
            $this->log("applied migration $value".PHP_EOL);
            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->savedMigrations($newMigrations);
        } else {
            $this->log("All migrations are applied");
        }
    }

    public function createMigrationTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
                            id SERIAL PRIMARY KEY,
                            migration CHARACTER VARYING(255),
                            created_at TIMESTAMP WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP)");
    }

    public function getAppliedMigrations()
    {
        $stmt = $this->pdo->prepare("SELECT migration FROM migrations");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_COLUMN);
        return $result;
    }

    public function savedMigrations(array $migrations)
    {
        $data = implode(",", array_map(fn($m) => "('$m')", $migrations));
        $stmt = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $data");
        // i don't prefer to do like here
        $stmt->execute();
    }

    protected function log($message)
    {
        echo '['.date('Y-m-d H:i:s') . '] - '.$message.PHP_EOL;
    }

}