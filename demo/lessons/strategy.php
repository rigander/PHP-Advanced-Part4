<?php
function foo($a, $b){
    if ($a==$b) return 0;
    return  ($a<$b) ? -1 : 1;
}
//todo usort — Сортирует массив по значениям используя пользовательскую функцию
// для сравнения элементов.
$array = [1,2,3,4,5];
usort($array, 'foo');

//todo Strategy example

interface Strategy{
    function doOperation($num1, $num2);
}
class OperationAdd{
    function doOperation($num1, $num2){
        return $num1 + $num2;
    }
}

class OperationMultiply{
    function doOperation($n1, $n2){
        return $n1 * $n2;
    }
}

class Context{
    private $strategy;
    function __construct(Strategy $s){
        $this->strategy = $s;
    }
    function execute($n1, $n2){
        return $this->strategy->doOperation($n1, $n2);
    }
}

$ctx = new Context(new OperationAdd());

echo $ctx->execute(2,3);

