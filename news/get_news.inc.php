<?php
$result = $news->getNews();
if($result === false){
  $errMsg = "Произошла ошибка при выводе новостной ленты";
}else{
  foreach($result as $item){
    $id = $item['id'];
    $title = $item['title'];
    $category = $item['category'];
    $description = nl2br($item['description']);
    $datetime = date("d-m-Y H:i:s",$item['datetime']);

    echo <<<LABEL
    <hr>
    <p>
        <b><a href="{$_SERVER['PHP_SELF']}?id=$id">$title</a></b> [$category] @ $datetime
        <br />$description
    </p>
    <p align="right">
        <a href="{$_SERVER['PHP_SELF']}?del=$id">Удалить</a>
    </p>
LABEL;
  }
}
