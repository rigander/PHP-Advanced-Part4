<?php
try {
  $db = new PDO("sqlite:users.db");

  echo 'Connected to database<br>';
    //todo ERRMODE_SILENT - PDO просто предоставит вам код ошибки,
    // который можно получить методами PDO::errorCode() и PDO::errorInfo().
    // Эти методы реализованы как в объектах запросов, так и в объектах баз
    // данных. Если ошибка вызвана во время выполнения кода объекта запроса,
    // нужно вызвать метод PDOStatement::errorCode() или
    // PDOStatement::errorInfo() этого объекта.
    // Если ошибка вызова объекта базы данных, нужно вызвать аналогичные
    // методы у этого объекта.
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

  $sql = "SELECT username FROM user";
  foreach ($db->query($sql) as $row){
    print $row['name'] .' - '. $row['email'] . '<br>';
  }

  $db = null;
}catch(PDOException $e){
  echo $e->getMessage();
}
