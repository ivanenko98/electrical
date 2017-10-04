<?php
/**
 * Created by PhpStorm.
 * User: westham
 * Date: 04.10.2017
 * Time: 18:05
 */

namespace app\models;


class Post extends Model
{
    public static $fields = [
        'id', 'message', 'time'
    ];

    public static function tableName()
    {
        return 'post';
    }
}