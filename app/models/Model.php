<?php

namespace app\models;

use app\Application;

abstract class Model implements ModelInterface
{
    public static $fields;

    public function __construct(array $config)
    {
        foreach ($config as $property => $value) {
            if (in_array($property, static::$fields)) {
                $this->{$property} = $value;
            }
        }
    }

    public static function find($condition = null)
    {
        $sql = 'SELECT * FROM `' . static::tableName() . '`';
        //если есть условие - добавляем его к запросу
        if ($condition) {
            $sql .= "WHERE $condition";
        }
        $PDOResult = Application::$pdo->query($sql);
        //создаем экземпляры класса модели и возвращаем из как результат поиска
        return self::createModels($PDOResult->fetchAll(\PDO::FETCH_ASSOC));
    }

    public static function createModels(array $queryResults)
    {
        $models = [];
        foreach ($queryResults as $record) {
            //в конец массива $models добавляем новый обьект модели
            $models[] = new static($record);
        }
        return $models;
    }
}