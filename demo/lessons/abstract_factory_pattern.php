<?php
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

//todo Создаём интерфейс и реализуем его в следующих классах.
interface Color{
    function fill();
}

class Red implements Color{
    function fill()
    {
        echo __METHOD__;
    }
}
class Green implements Color{
    function fill()
    {
        echo __METHOD__;
    }
}
class Blue implements Color{
    function fill()
    {
        echo __METHOD__;
    }
}


abstract class AbstractFactory{
    abstract function getShape($shapeType);
    abstract function getColor($colorName);
}



//todo Теперь создаём классы ShapeFactory & ColorFactory
class ShapeFactory extends AbstractFactory{
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
    public function getColor($colorName)
    {
        return null;
    }
}

class ColorFactory extends AbstractFactory{
    function getColor($name){
        $name = strtoupper($name);
        if (!$name) return null;
        switch ($name){
            case "RED" : return new Red(); break;
            case "GREEN" : return new Green(); break;
            case "BLUE" : return new Blue(); break;
            default:
                throw new Exception("Wrong color!");
        }
    }
    public function getShape($colorName)
    {
        return null;
    }
}

class FactoryProducer{
    static function getFactory($factoryType){
        if (!$factoryType) return null;
        switch (strtoupper($factoryType)){
            case "SHAPE" : return new ShapeFactory(); break;
            case "COLOR" : return new ColorFactory(); break;
            default: throw new Exception("Wrong factory type!");
        }
    }
}
$shapeFactory = FactoryProducer::getFactory("SHAPE");
$circle2 = $shapeFactory->getShape("CIRCLE");
$circle2->draw();

$colorFactory = FactoryProducer::getFactory("COLOR");
$red2 = $colorFactory->getColor("RED");
$red2->fill();