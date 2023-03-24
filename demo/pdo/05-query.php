<?php
//todo Универсальный метод для sql запросов - выборки данных. query().
$db = new PDO("sqlite:users.db");



$sql = "SELECT * FROM user";
foreach ($db->query($sql) as $row){
  print $row['name'] .' - '. $row['email'] . '<br>';
}
