<?php

namespace MyApp\Models;

class Users extends Model
{
    const TABLE = 'users';

    public static function check($login, $password)
    {
        $user = self::get($login);
        if (!$user) {
            return false;
        }

        return password_verify($password, $user['pass']);
    }

    public static function get($login)
    {
        $stmt = self::link()->prepare('SELECT * FROM ' . self::TABLE . ' WHERE login=:login LIMIT 1');
        $stmt->bindParam('login', $login, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}