<?php
//todo Шаблоны проектирования. Build.

//todo К примеру создаём следующий класс, который занимается отрисовкой
// API. Там есть ряд приватных свойств, значения которых задаются через
// конструктор, при создании экземпляра класса.
class Window{
    private $visible = false;
    private $modal = false;
    private $dialog = false;

    function __construct($d, $m, $v){
        $this->visible = $v;
        $this->modal = $m;
        $this->dialog = $d;
    }
}
//todo В результате в таком случае не видно зачем и какие параметры вводишь.
// Ведь в реальной ситуации сам класс мы можем не видеть, а также я не могу
// установить значение последнего параметра не касаясь первых двух.
// $w = new Window(true, false, true);

//todo Решение проблемы. Создаём класс который содержит задание параметров
// нужных нам свойств в методах этого класса.
class CreateWindow{
    function setDialog($flag = false){
        $this->dialog = $flag;
        return $this;
    }
    function setModal($flag = false){
        $this->modal = $flag;
        return $this;
    }
    function setVisible($flag = false){
        $this->visible = $flag;
        return $this;
    }
    function create(){
        return new Window($this->dialog, $this->modal, $this->visible);
    }
}
//todo Теперь когда мы создадим экземпляр класса CreateWindow, можно
// будет задавать состояния параметров для класса Window через методы,
// в любом удобном нужном нам порядке. и при помощи метода create создавать
// уже экземпляр класса Window, но уже с нужными параметрами свойств.
$w = new CreateWindow();
$w->setVisible(true)->setModal(true)->create();