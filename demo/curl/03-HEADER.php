<pre>
<?php
//todo Элемент HTML <pre> представляет собой предварительно
// отформатированный текст, который должен быть представлен точно так,
// как написано в HTML-файле.

//todo Когда нам идут возвращаемые значения которые мы запрашиваем из
// любого сервера, то нам вообще-то приходят еще и заголовки.
// И может быть потребность эти заголовки посмотреть (вдруг там человек
// куку ставит).
// Для этого существует опция CURLOPT_HEADER - true (1) для включения
// заголовков в вывод.
  require "_header.php";

  $curl = curl_init();
  curl_setopt ($curl, CURLOPT_URL, HOST_NAME . "test.php");

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  curl_setopt($curl, CURLOPT_HEADER, 1);

  $a = curl_exec ($curl);
  curl_close ($curl);
  echo $a;
