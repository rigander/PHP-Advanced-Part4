<?php 
  include_once 'classes/Favorites.class.php'; 
?>
<!DOCTYPE html>
<html>

<head>
  <title>Our recommendations</title>
  <meta charset="utf-8" />
  <style>
    header {
      border-bottom: 1px solid black;
      text-align: center;
      width: 80%
    }
    
    div#a,
    div#b,
    div#c {
      width: 30%;
      height: 200px;
      float: left
    }
  </style>
</head>

<body style="background-color: #3c3f41; color: #b79c1b;">
  <header>
    <h1>Recommended</h1>
  </header>
  <div id='a'>
    <h2>Useful websites</h2>
    <ul>
      <? /* Список сайтов */ ?>
    </ul>
  </div>
  <div id='b'>
    <h2>Useful plugins</h2>
    <ul>
      <? /* Список приложений */ ?>
    </ul>
  </div>
  <div id='c'>
    <h2>Useful articles</h2>
    <ul>
      <? /* Список статей */ ?>
    </ul>
  </div>
</body>

</html>