<?php
//todo Пример использования Iterator.
// Например я хочу итерировать числа от 3 до 7, и  на каждой итерации
// возводить числа в квадрат.

class NumberPow implements Iterator{
  private $start, $end;
  private $current;
//todo Создаём переменные start & end и принимаем их значения через конструктор
// во время создания объекта (экземпляра класса).
  public function __construct($start, $end){
    $this->start = $start;
    $this->end = $end;
  }
//todo Начинаем итерацию. Присваиваем свойству current значение из start.
  function rewind() {
    $this->current = $this->start;
  }
//todo  В теле метода current при помощи функции pow() возводим свойство
// current в указанную степень.
  function current() {
    return pow($this->current, 2);
  }
//todo В методе key() возвращаем текущее значение current, которое и попадет
// в ключ при реализации цикла foreach.
  public function key() {
    return $this->current;
  }
//todo В методе next() увеличиваем число на один.
  public function next() {
      $this->current++;
  }
//todo В методе valid() проверяем чтобы полученное число было меньше end.
// В зависимости от этого принимается решение продолжать цикл или нет.
  public function valid() {
        return $this->current <= $this->end;
  }
}

$values = new NumberPow(3, 7);

foreach ($values as $key => $value) {
  print "The square of a number $key = $value\n<br>";
}
