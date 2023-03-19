<?php
//todo К примеру я создаю свой класс MyIterator который реализует
// встроенный интерфейс Iterator.
// Когда я объект экземпляр этого класса брошу в foreach, php проверит
// что закинули в foreach. Видя объект имеющий отношение к interface Iterator
// php начнет последовательно дергать методы которые мы должны описать.
// 1. Отработает метод rewind().(в нем вывод строки rewinding и
// перевод указателя строки reset().
// 2. Реализую метод current(), который будет возвращать что-либо.
// внутри функция current() — Возвращает текущий элемент массива.
// 3. Затем дергается метод key(), который вызывает встроенную функцию
// key()  — Выбирает ключ из массива.
// 4. Затем цикл вызывает метод next(), который в свою очередь вызывает
// встроенную функцию next — Перемещает указатель массива вперёд на один элемент.
// 5. Итерация окончена и перед тем как совершить очередную итерацию,
// отрабатывает метод valid() который как раз и принимает решение на этот счет.
// Если valid() возвращает true то начинается новый цикл итерации.
// Общий вывод.
// Внутри этого класса мы просто перебираем массив, то что метод
// foreach делает обычно для массива автомате, но теперь нам доступна вся его
// логика под капотом. Таким образом мы залезли внутрь foreach и можем
// делать там все что угодно. Только вместо массива теперь в foreach запускаем
// объект (экземпляр особого класса). Реализация всех вышеописанных методов,
// теперь происходит на наше усмотрение.

class MyIterator implements Iterator{
  private $var = [];

  public function __construct($array){
    if (is_array($array)) {
      $this->var = $array;
    }
  }

  public function rewind() {
    echo "rewinding\n";
    reset($this->var);
  }

  public function current() {
    $var = current($this->var);
    echo "current: $var\n";
    return $var;
  }

  public function key() {
    $var = key($this->var);
    echo "key: $var\n";
    return $var;
  }

  public function next() {
    $var = next($this->var);
    echo "next: $var\n";
    return $var;
  }

  public function valid() {
    $var = $this->current() !== false;
    echo "valid: {$var}\n";
    return $var;
  }
}

$values = [1, 2, 3];
$it = new MyIterator($values);

foreach ($it as $key => $value) {
  print "$key: $value\n";
}
