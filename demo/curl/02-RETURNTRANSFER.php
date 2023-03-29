<?php
  require "_header.php";
  //todo К примеру я хочу перед тем как отдать данные браузеру обработать их.
  // то есть поместить результат функции curl_exec() в переменную.
  // Для этого нужно использовать параметр - CURLOPT_RETURNTRANSFER.
  // CURLOPT_RETURNTRANSFER - true (1) для возврата результата передачи
  // в качестве строки из curl_exec() вместо прямого вывода в браузер.

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, HOST_NAME . "test.php");

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($curl);
  curl_close($curl);

  //todo В результате я могу делать с полученными данными все что угодно,
  // перед тем как вывести их браузер.
  print $result;
