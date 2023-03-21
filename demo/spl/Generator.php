<?php
//todo Генератор в целом выглядит как обычная функция,
// за исключением того, что вместо возвращения одного значения,
// генератор будет перебирать столько значений, сколько необходимо.
// Любая функция, содержащая yield, является функцией генератора.
//function nums(){
//    echo "START<br>";
//
//    for($i=0; $i<5; ++$i){
//        yield $i;
//    }
//
//    echo "FINISH<br>";
//}
//foreach (nums() as $v)
//    echo "Value: $v <br>";

//function gen(){
//    yield "a";
//    yield "b";
//    yield 10 => "Hello";
//    yield "e";
//}
//
//foreach (gen() as $k=>$v) {
//    echo "$k : $v<br>";
//
//}

function echoLogger(){
    while(true){
        echo "Log: " . yield . "<br>";
    }
}

$logger = echoLogger();
$logger->send('Hello');
$logger->send('World');