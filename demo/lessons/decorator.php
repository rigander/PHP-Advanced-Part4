<?php
Interface Shape{
    function draw();
}

class Square implements Shape {
    function draw(){
        echo __METHOD__;
    }
}
class Rectangular implements Shape {
    function draw(){
        echo __METHOD__;
    }
}
class Circle implements Shape {
    function draw(){
        echo __METHOD__;
    }
}

/*****************/
abstract class ShapeDecorator implements Shape{
    protected $decoratedShape;
    //todo Таким синтаксисом мы говорим что в параметр конструктора может
    // быть записан только объект чей класс реализует интерфейс Shape.
    function __construct(Shape $decoratedShape){
        $this->decoratedShape = $decoratedShape;
    }
    function draw(){
        $this->decoratedShape->draw();
    }
}




