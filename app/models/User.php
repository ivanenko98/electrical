<?php

namespace app\models;


use app\Application;

class User extends Model
{
    public static $fields = [
        'id', 'email', 'password'
    ];

    public static function tableName()
    {
        return 'users';
    }

    public static function checkCredentials($email, $password)
    {
        $sql = 'SELECT * FROM `' . static::tableName() . '` WHERE `email` = "'.$email.'" AND `password` = "'.$password.'"';
        $PDOResult = Application::$pdo->query($sql);

        //создаем экземпляры класса модели и возвращаем из как результат поиска
        return count(self::createModels($PDOResult->fetchAll(\PDO::FETCH_ASSOC))) > 0;
    }
}