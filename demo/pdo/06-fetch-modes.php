<?php
//todo PDOStatement::fetch — Извлечение следующей строки
// из результирующего набора.
// fetch_assoc — Выбирает следующую строку из набора
// результатов и помещает её в ассоциативный массив.

$db = new PDO("sqlite:users.db");
$sql = "SELECT * FROM user";

$stmt = $db->query($sql);

//$result = $stmt->fetch(PDO::FETCH_ASSOC);
$result = $stmt->fetch(PDO::FETCH_NUM);
//$result = $stmt->fetch(PDO::FETCH_BOTH);



foreach($result as $key=>$val){
  echo $key.' - '.$val.'<br>';
}

