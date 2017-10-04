<?php
/**
 * Created by PhpStorm.
 * User: westham
 * Date: 04.10.2017
 * Time: 17:59
 */

namespace app\models;

interface ModelInterface
{
    //каждая модель может на[одить записи из своей таблицы
    public static function find($condition);

    //у кадой модели есть своя таблица в БД, этот метод вернет ее имя
    public static function tableName();
}