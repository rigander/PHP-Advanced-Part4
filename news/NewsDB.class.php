<?php
include "INewsDB.class.php";
class NewsDB implements INewsDB, IteratorAggregate{
  const DB_NAME = 'news.db';
  protected $_db;
  protected $_items;
  function __construct(){
    if(is_file(self::DB_NAME)){
      $this->_db = new PDO('sqlite:' .self::DB_NAME);
      $this->_db->setAttribute(PDO::ATTR_ERRMODE,
          PDO::ERRMODE_EXCEPTION);
    }else{
      $this->_db = new PDO('sqlite:' .self::DB_NAME);
      $this->_db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE TABLE msgs(
                              id INTEGER PRIMARY KEY AUTOINCREMENT,
                              title TEXT,
                              category INTEGER,
                              description TEXT,
                              source TEXT,
                              datetime INTEGER
                          )";
      $this->_db->exec($sql) or $this->_db->errorCode();
      $sql = "CREATE TABLE category(
                                  id INTEGER PRIMARY KEY AUTOINCREMENT,
                                  name TEXT
                              )";
      $this->_db->exec($sql) or $this->_db->errorCode();
      $sql = "INSERT INTO category(id, name)
                  SELECT 1 as id, 'Политика' as name
                  UNION SELECT 2 as id, 'Культура' as name
                  UNION SELECT 3 as id, 'Спорт' as name";
      $this->_db->exec($sql) or $this->_db->errorCode();
    }
    $this->getCategories();
  }
  private function getCategories(){
      $sql = "SELECT id, name FROM category";
      $result = $this->_db->query($sql);
      while($row = $result->fetch(PDO::FETCH_ASSOC))
          $this->_items[$row["id"]] = $row["name"];
  }
  public function getIterator(){
      //todo Что происходит? мы указываем php взять массив, сооруди
      // итератор из этого массива и верни.
      return new ArrayIterator($this->_items);
  }

    function __destruct(){
    unset($this->_db);
  }
  function saveNews($title, $category, $description, $source){
    $dt = time();
    $sql = "INSERT INTO msgs(title, category, description, source, datetime)
                VALUES($title, $category, $description, $source, $dt)";
    $ret = $this->_db->exec($sql);
    if(!$ret)
      return false;
    return true;	
  }	
  protected function db2Arr(PDOStatement $data){
    $arr = [];
    while($row = $data->fetch(PDO::FETCH_ASSOC))
      $arr[] = $row;
    return $arr;
  }
  public function getNews(){
    try{
      $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime 
              FROM msgs, category
              WHERE category.id = msgs.category
              ORDER BY msgs.id DESC";
      $result = $this->_db->query($sql);
      return $this->db2Arr($result);
    }catch(PDOException $e){
      return false;
    }
  }	
  public function deleteNews($id){
    try{
      $sql = "DELETE FROM msgs WHERE id = $id";
      $result = $this->_db->exec($sql);
      return true;
    }catch(PDOException $e){
      echo $e->getMessage();
      return false;
    }
  }
  function clearData($data){
      return $this->_db->quote($data);
  }	
}