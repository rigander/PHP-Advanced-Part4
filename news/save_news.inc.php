<?php
$title = $news->clearData($_POST['title']);
$desc = $news->clearData($_POST['description']);
$source = $news->clearData($_POST['source']);
$category = $_POST['category'];
if(empty($title) or empty($desc)){
  $errMsg = 'FIELDS!';
}else{
  $ret = $news->saveNews($title, $category, $desc, $source);
  if(!$ret){
    $errMsg = 'Save error!';
  }else{
    header('news.php');
  }
}
