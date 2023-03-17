<?php
//todo Предположим у нас есть какой-то проект и мы решили реализовать некий
// класс logger который разработчик будет использовать в нужном ему месте
// для записи каких-либо логов.

class Logger{
    const LOG_NAME = "file.log";

    function log($str){
        file_put_contents(self::LOG_NAME, $str.PHP_EOL,
        FILE_APPEND);
    }
}
//todo В такой ситуации если каждый будет создавать себе объект класса Logger
// для своих целей, вместо того чтобы пользоваться одним таким объектом, то
// будет создано очень много лишних объектов. Так же мы не знаем использовал ли
// кто-то уже объект и если да не удалил ли его.

$log = new Logger;

//todo Для решения этой задачи идеальна одиночка.
// Singleton.

class Logger2{
    const LOG_NAME2 = "file.log";
    private static $_instance;

    private function __construct(){
    }
    private function __clone(){
    }

    static function getInstance(){
        if (self::$_instance == null)
            self::$_instance = new self();
        return self::$_instance;
    }

    function log($str){
       file_put_contents(self::LOG_NAME2, $str.PHP_EOL,
       FILE_APPEND);
    }
}
//todo Синтаксис вызова метода класса принадлежащего самому классу.
$log2 = Logger2::getInstance();

//todo Теперь если мне нужно создать экземпляр класса Logger2,
// то я просто вызываю его метод getInstance() и если экземпляр уже существует,
// то он мне возвращается, а если нет то создастся.

$log2->log("Breakpoint #1");
//todo или вызов в виде цепочки
Logger2::getInstance()->log("Break point #2");

$log3 = Logger2::getInstance();
$log3->log("Break point #3");

//todo то есть мы пользуемся в результате все одним экземпляром. Создается он
// лишь один раз, а мы лишь создаём ссылки к нему.