<pre>
<?php
abstract class MyClass{
  public $a = 1;
  protected $b = 2;
  private $c = 3;
  public static $cnt = 0;
  const HANDS = 2;
  abstract function foo();
  public static function bar(){
    //Что-то делаем
  }
  public function sayHello($name, $h="1"){
    static $count = 0;
    return "<h$h>Hello, $name</h$h>";
  }
}
//todo Reflection::export — Экспортирует Reflection.
// Внимание Эта функция УСТАРЕЛА, начиная с PHP 7.4.0 и была УДАЛЕНА,
// начиная с PHP 8.0.0.
// Использовать эту функцию крайне не рекомендуется.

// Обзор пользовательского класса
Reflection::export(new ReflectionClass('MyClass'));
exit;

// Обзор встроенного класса
Reflection::export(new ReflectionClass('Exception'));
?>
</pre>