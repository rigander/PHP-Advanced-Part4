<?php
//todo Есть заголовки очень часто используемые. Соответственно под самые известные
// заголовки существуют свои соответствующие опции.
// CURLOPT_USERAGEN - Содержимое заголовка "User-Agent: ", посылаемого
// в HTTP-запросе.
  require "_header.php";
  $curl = curl_init(); 
  curl_setopt($curl, CURLOPT_URL, HOST_NAME . "alloptions.php"); 

  curl_setopt($curl, CURLOPT_USERAGENT, "Super-Puper browser");
  curl_setopt($curl, CURLOPT_REFERER, "http://ya.ru");
  curl_setopt($curl, CURLOPT_COOKIE, "name=John");
  curl_setopt($curl, CURLOPT_HTTPHEADER, ["Header1: Value1", "Header2: Value2"]);

  curl_exec ($curl); 
  curl_close ($curl); 

