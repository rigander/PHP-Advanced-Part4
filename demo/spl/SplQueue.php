<?php
//todo SplQueue usage example.
// К примеру у нас есть какой-то список актёров. actors-list.txt
// И нам необходимо разбить их по парам в по принадлежности к государству.

class Actors{
    public $name, $state;
    function __construct($n, $s){
        $this->name = $n;
        $this->state = $s;
    }
}
//todo Здесь мы используем в круглых скобках type-hinting, то есть
// в параметры функции должны прийти объекты экземпляры класса SplQueue.
function getActors(SplQueue $usa, SplQueue $mx){
    //todo Зачитываем файл со списком - построчно.
    // list — Присваивает переменным из списка значения подобно массиву.
    // count — Подсчитывает количество элементов массива.
    // file — Читает содержимое файла и помещает его в массив.
    // enqueue - добавить. dequeue - убавить.
    $lines = file('actors-list.txt');
    $count = count($lines);
    for($i=0; $i<$count; ++$i){
        list($state, $name) = explode(":", $lines[$i]);
        if ($state == "USA")
            $usa->enqueue(new Actors($name, $state));
        else
            $mx->enqueue(new Actors($name, $state));
    }
}function act(SplQueue $usa, SplQueue $mx){
    echo "Pair of actors:<br>";
    while (!$usa->isEmpty() && !$mx->isEmpty()){
        $person = $usa->dequeue();
        echo "USA: " . $person->name;
        $person = $mx->dequeue();
        echo "with MX: " . $person->name;
        echo "<br>";
    }
}
//todo В результате мы заполнили объекты и рассортировали в них актёров.
// И теперь есть два списка в очереди.
$usaActor = new SplQueue;
$mxActor = new SplQueue;
getActors($usaActor, $mxActor);

act($usaActor, $mxActor);

if(!$usaActor->isEmpty()){
    echo $usaActor->count() . "from USA waiting in the queue";
}
if(!$mxActor->isEmpty()){
    echo $mxActor->count() . "from USA waiting in the queue";
    echo "Last in the queue ". $usaActor->bottom()->name;
}

//todo Главная идея в том что объекты попадают и выходят в родительский
// объект строго по очереди.






