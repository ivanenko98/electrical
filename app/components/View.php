<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 9/27/17
 * Time: 8:04 PM
 */

namespace app\components;

/**
 * Class View
 *
 * Используется для создание обьекта представления
 *
 * @package app\components
 */
class View
{
    // путь к файлу с шаблоном для представления (view)
    protected $path;

    // переменные, которые используются в престалении и потом будут заменены на данные из контроллера
    protected $variables;

    public function __construct(string $path)
    {
        //установить путь к файлу с шаблоном представления ( /var/www/mvc.loc/resources/views/post/all
        $this->setPath($path);
    }

    //функция чтобы установить путь к файлу с шаблоном представления ( /var/www/mvc.loc/resources/views/post/all
    public function setPath($path){
        //проверяем существует ли файл с предсталением
        if(file_exists($path)){
            //если существует - устанавливаем значение в свойство класса View
            $this->path = $path;
        }else{
            //если не существует файла - выводим ошибку
            throw new \Exception('View file was not found');
        }

    }

    //принимаем и запсываем массив с переменными, которые будем испольовать в шаблоне
    public function setVariables(array $variables){
        $this->variables = $variables;
    }

    //функция-геттер для получения пути к файлу представления
    public function getPath():string
    {
        return $this->path;
    }

    /**
     * функция для динамичной генерации представления
     *
     * так как в файле предсталения мы используем переменные,
     * которые получаем из контроллера,
     * то перед тем как вывести содержимое самого файла,
     * нужно сначала обработать его и вставить значения переменных и выполнить php-скрипты
     *
     * @return string
     */
    public function render(){
        /**
         * включаем буфер вывода
         * это нужно для того, чтобы рзультат выполнения
         * всего php-кода, который находится в файле представления
         * мы могли получить в переменную в виде строки
         */
        ob_start();

        /**
         * извлекаем из массива переменные, которые мы используем и кидаем их в область видимости текущей функции
         * http://php.net/manual/ru/function.extract.php
         */
        extract($this->variables);

        /**
         * выполняем файл представления
         * так как мы включили буфер вывода,
         * то его результать будет записан в этот временный буфер, а не на экран пользователя
         */
        include($this->getPath());

        //записываем контент из временного буфера в переменную в виде строки
        $content = ob_get_contents();

        //чистим содержимое фуфера и закрываем его, чтобы не тратить ресурсы сервера впустую
        ob_end_clean();

        //возвращаем строку с готовым сгенерированным файлом представления
        return $content;
    }
}