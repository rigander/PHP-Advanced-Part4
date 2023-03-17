<?php
//todo Fabric Method.
// Порождающий шаблон проектирования. Задача в том чтобы дать
// какой-либо interface который будет создавать объекты. И подклассы уже будут сами
// определять какой класс инстанциировать (создавать экземпляры).

//todo Сначала создаётся interface в котором описывается база того что там
// должно быть. Этот интерфейс реализуется какими-то конкретными классами.

interface Shape{
    function draw();
}

class Square implements Shape {
    function draw()
    {
        echo __METHOD__;
    }
}
class Rectangular implements Shape {
    function draw()
    {
        echo __METHOD__;
    }
}
class Circle implements Shape {
    function draw()
    {
        echo __METHOD__;
    }
}

//todo Далее создается класс в котором есть метод отвечающий за создание
// нужного объекта (экземпляра одного из выше описанных классов).

class ShapeFactory{
    function getShape($type){
        $type = strtoupper($type);
        if (!$type) return null;
        switch ($type){
            case "SQUARE" : return new Square(); break;
            case "RECTANGULAR" : return new Rectangular(); break;
            case "CIRCLE" : return new Circle(); break;
            default:
                throw new Exception("Wrong type!");
        }
    }
}

$factory = new ShapeFactory();

$rectangular = $factory->getShape("RECTANGULAR");
$circle = $factory->getShape("CIRCLE");
$triangle = $factory->getShape("SQUARE");

//todo Унаследованный для всех метод draw, позволяет отрисовать объект, когда
// это нужно.

$circle->draw();
$rectangular->draw();
$triangle->draw();
