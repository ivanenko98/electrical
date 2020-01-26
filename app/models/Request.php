<?php

namespace app\models;

class Request extends Model
{
    public static $fields = [
        'id', 'name', 'phone', 'email', 'subject', 'message', 'created_at'
    ];

    public static function tableName()
    {
        return 'requests';
    }
}