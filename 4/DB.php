<?php

class DB
{
    public const TABLE_GOODS = 'goods';

    private static $config = [
        'host' => 'localhost',
        'user' => 'mysql',
        'pwd' => 'mysql',
        'db' => 'dz4',
    ];

    private static $instance;
    private $link;

    public function getCount($tableName)
    {
        return $this->link
            ->query("SELECT COUNT(*) FROM {$tableName}")
            ->fetchColumn();
    }

    public function getPart($tableName, int $start, int $limit)
    {
        try {
            return $this->link
                ->query("SELECT * FROM {$tableName} LIMIT {$start}, {$limit}")
                ->fetch_all(PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            return false;
        }
    }

    public function getAllData($tableName)
    {
        try {
            return $this->link
                ->query('SELECT * FROM ' . $tableName)
                ->fetch_all(PDO::FETCH_ASSOC);
            } catch (Throwable $e) {
                return false;
        }
    }

    public function getById($tableName, $id)
    {
        return $this->link
            ->query('SELECT * FROM ' . $tableName . ' WHERE id = ' . (int)$id)
            ->fetch_assoc();
    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $this->link = mysqli_connect(
            self::$config['host'],
            self::$config['user'],
            self::$config['pwd'],
            self::$config['db']
        );

        if (false === $this->link) {
            die ("Can't connect to DB");
        }
    }
}