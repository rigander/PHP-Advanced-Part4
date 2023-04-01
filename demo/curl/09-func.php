<?php 
require "_header.php";
function curlHeaderCallback($curl, $headers) { 
  header($headers); 
	
  header('Content-Disposition: attachment; filename="file-name.zip"'); 
  
  return strlen($headers); 
} 

$str = HOST_NAME . 'zip.php'; 
$curl = curl_init(); 
curl_setopt($curl, CURLOPT_URL, $str); 
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
//todo CURLOPT_BINARYTRANSFER - do a binary transfer. сообщаем что это бинарные
// данные.
// CURLOPT_HEADERFUNCTION (вешаем функцию обратного вызова)
// Callback-функция принимает два параметра
// 1 параметром является дескриптор cURL,
// 2 параметром является строка с записываемыми заголовками.
// Заголовки должны быть записаны с помощью данной callback-функции.
// Должна возвратить количество записанных байт.
curl_setopt($curl, CURLOPT_HEADERFUNCTION, 'curlHeaderCallback'); 


curl_exec($curl); 

$result = curl_getinfo($curl, CURLINFO_HTTP_CODE); 
curl_close ($curl); 

if ($result != 200) { 
  print 'Ошибка: ' . $result; 
} 