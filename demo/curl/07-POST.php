<?php
//todo Есть необходимость посылать данные на сервер, для чего используется
// метод POST. В cURL это тоже реализовано.
// CURLOPT_POST - true для использования обычного HTTP POST. Данный метод POST
// использует обычный application/x-www-form-urlencoded, обычно
// используемый в HTML-формах.
// CURLOPT_POSTFIELDS - Все данные, передаваемые в HTTP POST-запросе.
// Этот параметр может быть передан как в качестве url-закодированной
// строки, наподобие 'para1=val1&para2=val2&...', так и в виде массива,
// ключами которого будут имена полей, а значениями - их содержимое.
// Если value является массивом, заголовок Content-Type будет
// установлен в значение multipart/form-data.
// Файлы можно отправлять с использованием CURLFile
// или CURLStringFile, в этом случае value должен быть массивом.
  require "_header.php";
  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, HOST_NAME . "posttest.php");
//todo CURLOPT_POST - запрос посылать методом POST.
  curl_setopt($curl, CURLOPT_POST, 1);
//todo Формируем поля которые будут передаваться и в опции указываем
// что это поля POST.
// В запросе все специальные символы идут в виде URL encoding.
  curl_setopt($curl, CURLOPT_POSTFIELDS, "Hello=World&Foo=Bar&Name=Igor");

  curl_exec ($curl);
  curl_close ($curl);
