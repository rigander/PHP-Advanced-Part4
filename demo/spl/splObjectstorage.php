<?php
//todo Пример использования SplObjectStorage().
// SplObjectStorage implements ArrayAccess, Serializable, Traversable,
// Countable

class Course{
    private $name;
    function __construct($n){
        $this->name = $n;
    }
    function __toString(){
        return $this->name;
    }
}
$php = new Course("php");
$xml = new Course("xml");
$html = new Course("html");
$java = new Course("java");

$courses = new SplObjectStorage();
//todo При помощи встроенного метода attach() добавляем в наше хранилище
// объекты.
$courses->attach($php);
$courses->attach($xml);
$courses->attach($html);
$courses->attach($java);
//todo Проверяем если в хранилище (в этом объекте) интересующие
// нас объекты.
var_dump($courses->contains($php));
var_dump($courses->contains($java));
//todo Теперь к примеру мы решили удалить один из объектов из
// хранилища.
$courses->detach($html);
var_dump($courses->contains($html));
//todo Теперь решили вывести список объектов в массив.
$titles = [];
foreach ($courses as $course){
    $titles[] = (string)$course;
    echo join(', ', $titles);
}
