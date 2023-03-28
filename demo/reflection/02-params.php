<pre>
<?php
function foo1($a, $b, $c) { }
function foo2(Exception $a, &$b, $c) { }
function foo3(ReflectionFunction $a, $b = 1, $c = null) { }
function foo4() { }

// Создание экземпляра класса ReflectionFunction
$reflect = new ReflectionFunction("foo1");

echo $reflect;
var_dump($reflect->getParameters());
$parameters = $reflect->getParameters();
print_r($parameters[0]);
$parameter = $parameters[0];
echo $parameter->getName();
exit;

//todo getName() — Получает название. Доступен только как метод объекта класса
// getParameter, который в свою очередь создаётся только в массиве объектов
// возвращаемых методом getParameters().
// var_export() — Выводит или возвращает интерпретируемое
// строковое представление переменной
// ReflectionParameter::allowsNull — Проверяет, допустимо ли значение null
// для параметра
// ReflectionParameter::isPassedByReference — Проверяет, передан ли параметр
// по ссылке
// ReflectionParameter::isOptional — Проверяет, является ли аргумент
// необязательным
foreach ($reflect->getParameters() as $i => $param) {
    printf(
        "-- Параметр #%d: %s {\n".
        "   Допускать NULL: %s\n".
        "   Передан по ссылке: %s\n".
        "   Обязательный?: %s\n".
        "}\n",
        $i,
        $param->getName(),
        var_export($param->allowsNull(), 1),
        var_export($param->isPassedByReference(), 1),
        $param->isOptional() ? 'нет' : 'да'
    );
}
?>
</pre>