<?php

  $db = new PDO("sqlite:users.db");
    

  //INSERT
  $count = $db->exec("INSERT INTO user(name, email) 
VALUES ('John', 'john@gmail.com')");

  echo $count;


  //UPDATE
//todo В случае не успеха сюда прейдет значение false.
// Сделать проверку в стиле if(!$count) тоже не годиться, так
// сюда может прийти и значение ноль, то есть годиться только вариант
// строгой проверки if($count === false).(никаких приведений типов таком
// случае уже быть не может).
  $count = $db->exec("UPDATE user SET email='john@mail.ru' 
            WHERE name='John'");

  echo $count;

