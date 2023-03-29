<?php
//todo Простейший пример cURL

  require "_header.php";
//todo Инициализация сURL
  $curl = curl_init();
//todo curl_setopt — Устанавливает параметр для сеанса CURL
// CURLOPT_URL - Загружаемый URL. Данный параметр может быть также
// установлен при инициализации сеанса с помощью curl_init().
// HOST_NAME . "test.php" - сам URL в виде конкатенации константы и имени файла.
  curl_setopt($curl, CURLOPT_URL, HOST_NAME . "test.php");
//todo curl_exec — Выполняет стандартный запрос cURL (что то типа file_get_contents)
  curl_exec($curl);
//todo Закрыть. curl_close — Завершает сеанс cURL.
  curl_close($curl);
