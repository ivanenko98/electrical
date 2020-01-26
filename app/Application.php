<?php

namespace app;

class Application{

    public $config;

    public static $pdo;

    private $queryHandler;

    public $controller;

    public function __construct(array $config)
    {
        $this->config = $config;

        $this->queryHandler = QueryHandler::getInstance();
        $this->connectDatabase($this->config['host'],$this->config['username'],$this->config['password'],$this->config['database']);
    }

    public function run(){
        $this->controller = $this->queryHandler->handle($_SERVER['REQUEST_URI']);

        echo $this->controller->runAction();
    }

    public function connectDatabase(
        string $host, string $user, string $password, string $database, $options = null){
        try{
            //пытаемся подклчиться
            self::$pdo =
                new \PDO("mysql:host=$host;dbname=$database", $user, $password, $options);
        }catch (\PDOException $exception){
            //если подключение невозможно - выводим ошибку и останавливаем скрипт
            echo "Connection issue: ".$exception->getMessage();
            exit();
        }
    }
}