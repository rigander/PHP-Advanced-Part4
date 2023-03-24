<?php
//todo PDO - Php Data Object.
// позволяет работать с СУБД через методы класса PDO.
// Выбор типа СУБД и файла БД. Все параметры можно подключать через ini
// конфигурационный файл.
// Например $params = parse_ini_file("config.ini");
// $db = new PDO($params["db.com"],
//              $params["db.user"],
//              $params["db.pass"]);


$dbh = new PDO("sqlite:test.db");

//todo  Для безответных запросов теперь доступен метод exec().
// В случае успеха exec вернет количество строк над которыми было произведено
// изменение.
$count = $dbh->exec("INSERT INTO user(name, email) 
VALUES ('John', 'john@gmail.com')");
