<?php
//todo Delegator
// Очень часто у нас может быть несколько классов, которые реализуют один и тот
// же interface.
// Например есть некий интерфейс содержащий методы и
interface I{
    function foo();
    function bar();
}
class A implements I{
    public function bar(){
        echo __METHOD__;
    }
    public function foo(){
        echo __METHOD__;
    }
}
class B implements I{
    public function bar(){
        echo __METHOD__;
    }
    public function foo(){
        echo __METHOD__;
    }
}

class C implements I{
    protected $class;
    function __construct(){
        $this->class = new A;
    }

    public function bar(){
        $this->class->bar();
    }
    public function foo(){
        $this->class->foo();
    }

    function toA(){
        $this->class = new A;
    }
    function toB(){
        $this->class = new B;
    }
}
//todo Теперь я могу переключаться между классами (экземплярами) и их методами.
// Создав экземпляр класса C мы на самом деле через конструктор так же создали
// экземпляр класса A и получили доступ ко всем его методам.
$c = new C;
$c->foo();

// todo При помощи метода toB() мы можем создать экземпляр B и использовать уже
//  соответственно его методы. Важно что класс A и B на самом деле имеют одноименные
//  методы.
$c->toB();
$c->foo();
$c->bar();


