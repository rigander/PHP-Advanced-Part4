<?php
//todo ziparchive - класс создающий Файловый архив, сжатый Zip.
  $zip = new ZipArchive();
  $filename = "test.zip";
//todo ZipArchive::open — Открывает ZIP-архив.
// Открывает новый или существующий ZIP-архив для чтения,
// записи или изменения.
// ZIPARCHIVE::CREATE - Создавать архив, если он не существует.
// ZipArchive::addFromString — Добавляет файл в ZIP-архив,
// используя его содержимое. То есть создай в архиве файл и запиши в него
// следующую строчку.
  if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
    exit("cannot open $filename\n");
  }
  // Создаём в архиве файл "test-file-php-2.txt" и записываем в него строку
  $str = "#1 This is a test string added as testfilephp1.txt.\n";
  $zip->addFromString("test-file-php-1.txt", $str);

  // Создаём в архиве файл "test-file-php-2.txt" и записываем в него строку
  $str = "#2 This is a test string added as testfilephp1.txt.\n";
  $zip->addFromString("test-file-php-2.txt", $str);

  // Копируем в архив существующий файл "test.txt" и переименовываем его в "test-from-file.txt"
  $zip->addFile("test.txt","test-from-file.txt");

  $zip->close();
//todo file_get_contents — Читает содержимое файла в строку
  echo file_get_contents($filename);
