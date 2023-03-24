<?php
//todo При использовании отлова ошибок в PDO нет нужды писать
// throw new exception.
try {
  $db = new PDO("sqlite:users.db");

  echo 'Connected to database<br>';
    //todo ATTR_ERRMODE - настраиваем режим ошибок.
    // ERRMODE_EXCEPTION - хотим чтобы в случае ошибок выскакивал exception.
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT username FROM user";
  foreach ($db->query($sql) as $row){
    print $row['name'] .' - '. $row['email'] . '<br>';
  }

  $db = null;
}catch(PDOException $e){
  echo $e->getMessage();
}
