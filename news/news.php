<?php
include 'NewsDB.class.php';
$news = new NewsDB;
//todo Теперь мы можем взять объект NewsDB и прямо его бросать в foreach,
// так как мы уже сделали итератор из массива который приходит в NewsDB.
$errMsg = '';
if($_SERVER['REQUEST_METHOD']=='POST')
  include 'save_news.inc.php';
if(isset($_GET['del']) && is_numeric($_GET['del'])){
  include "delete_news.inc.php";
}
?>

<!DOCTYPE html>

<html>
<head>
	<title>News Feed</title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Breaking news</h1>
<?php
if($errMsg)
  echo $errMsg;
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

News title:<br />
<input class="news-title" type="text" name="title" /><br />
Choose category:<br />
<select name="category">
<?php
    //todo Сам объект news бросаем в цикл.
    foreach ($news as $value => $name)
    echo "<option value='$value'>$name</option>";
?>
</select>
<br />
News text:<br />
<textarea name="description" cols="50" rows="5"></textarea><br />
Source:<br />
<input class="source" type="text" name="source" /><br />
<br />
<input class="button" type="submit" value="Add to feed" />

</form>

<?php
  include "get_news.inc.php";
?>

</body>
</html>