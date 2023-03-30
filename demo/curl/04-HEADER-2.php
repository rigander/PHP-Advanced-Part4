<?php
//todo Обычно заголовки нужны отдельно от тела ответа, для этого есть опция.
// CURLOPT_NOBODY - true для исключения тела ответа из вывода.
// Метод запроса устанавливается в HEAD.
// Смена этого параметра в false не меняет его обратно в GET.
// Таким образом мы получим только заголовок.

  require "_header.php";

  $curl = curl_init();
  curl_setopt ($curl, CURLOPT_URL, HOST_NAME . "test.php");

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HEADER, 1);

  curl_setopt($curl, CURLOPT_NOBODY, 1);

  $a = curl_exec ($curl);
  curl_close ($curl);
  echo $a;
