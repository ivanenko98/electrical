<?php
namespace app\http;

use app\components\View;

abstract class Controller
{
    public $action;

    public function __construct(string $action)
    {
        $this->action = $action;
    }

    public function runAction()
    {
        if (method_exists($this, $this->action)) {
            return $this->{$this->action}();
        }
        throw new \Exception('Requested URL was not found', 404);
    }

    public function render($viewID, array $variables){
        /**
         * генерируем АБСОЛЮТНЫЙ путь к файлу
         *
         * $_SERVER['DOCUMENT_ROOT'] содержит в себе что-то вроде/var/www/mvc.loc (в зависимости откуда вы запускаете жтот скрипт)
         * тоесть корневую папку, где лежит проект
         *
         */
        $viewPath = $_SERVER['DOCUMENT_ROOT']."/resources/views/$viewID.php";


        //проверяем существует ли такой файл
        if(file_exists($viewPath)){
            //создаем новый обьект класса View и передаем ему полный путь к файлу с шаблоном представления
            $view = new View($viewPath);

            //устанавливаем переменные которые будут использоваться в файле представления
            $view->setVariables($variables);

            //выполняем файл представления и получаем готовый выполненный результат
            return $view->render();
        }

        //если файл не существует - бросаем ошибку об этом
        throw new \Exception('View was not found');
    }
}
