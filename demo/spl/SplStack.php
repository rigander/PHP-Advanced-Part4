<?php
//todo Проверим строку не является ли она палиндромом.
// (словом которое можно читать и вперед и назад).

function isPalindrome($word){
    //todo Убираем все пробелы и строки и приводим к нижнему регистру.
    $word = strtolower(str_replace(" ", "", $word));
    $s = new SplStack;
    //todo Измеряем длину строки и перебираем строку по буквам в цикле.
    $cnt = strlen($word);
    for($i=0; $i<$cnt; ++$i)
        $s->push($word[$i]);
    $rword = '';
    while ($s->count() > 0)
        $rword .=$s->pop();
    return $word == $rword;
}
$w = "rotator";

if (isPalindrome($w))
    echo "$w is a palindrome";
else
    echo "$w is not a palindrome";