<?php
//todo IteratorAggregate создаст объект который должен вернуть объект,
// который реализует итератор который должен итерировать.
class NumberPow implements Iterator{
    private $obj;
    private $current;

    public function __construct($obj){
        $this->obj = $obj;
    }

    function rewind() {
        $this->current = $this->obj->getStart();
    }

    function current() {
        return pow($this->current, 2);
    }

    public function key() {
        return $this->current;
    }

    public function next() {
        $this->current++;
    }

    public function valid() {
        return $this->current <= $this->obj->getEnd();
    }
}
class NumberSquare implements Iterator{
  private $obj;
  private $current;

  public function __construct($obj){
    $this->obj = $obj;
  }

  function rewind() {
    $this->current = $this->obj->getStart();
  }

  function current() {
    return sqrt($this->current);
  }

  public function key() {
    return $this->current;
  }

  public function next() {
      $this->current++;
  }

  public function valid() {
        return $this->current <= $this->obj->getEnd();
  }
}
class NumberAction implements IteratorAggregate{
    private $start, $end, $action;
    function __construct($start, $end, $action){
        $this->start = $start;
        $this->end = $end;
        $this->action = $action;
    }
    public function getIterator()
    {
        // TODO: Обязаны реализовать этот метод.
        //  Это условие интерфейса IteratorAggregate.
        //  Если в свойство action мы получили нужное слово,
        //  то данный метод будет использовать соответствующий
        //  итератор и создаст его объект.
        //  Таким образом через агрегатор итераторов можно иметь под
        //  одной крышей любое число ранее созданных специфических итераторов.

        switch ($this->action){
            case "pow" : return new NumberPow($this); break;
            case "sqrt" : return new NumberSquare($this); break;
        }
    }

    function getStart(){
        return $this->start;
    }
    function getEnd(){
        return $this->end;
    }
    

}

$obj = new NumberAction(3, 7, "pow");
foreach ($obj as $key => $value) {
    print "The square of a number $key = $value\n<br>";
}