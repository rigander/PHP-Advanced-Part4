<?php
include "INewsDB.class.php";
class NewsDB implements INewsDB{
  const DB_NAME = 'news.db';
  protected $_db;
  function __construct(){
    if(is_file(self::DB_NAME)){
      $this->_db = new SQLite3(self::DB_NAME);
    }else{
      $this->_db = new SQLite3(self::DB_NAME);
      $sql = "CREATE TABLE msgs(
                              id INTEGER PRIMARY KEY AUTOINCREMENT,
                              title TEXT,
                              category INTEGER,
                              description TEXT,
                              source TEXT,
                              datetime INTEGER
                          )";
      $this->_db->exec($sql) or $this->_db->lastErrorMsg();
      $sql = "CREATE TABLE category(
                                  id INTEGER PRIMARY KEY AUTOINCREMENT,
                                  name TEXT
                              )";
      $this->_db->exec($sql) or $this->_db->lastErrorMsg();
      $sql = "INSERT INTO category(id, name)
                  SELECT 1 as id, 'Политика' as name
                  UNION SELECT 2 as id, 'Культура' as name
                  UNION SELECT 3 as id, 'Спорт' as name";
      $this->_db->exec($sql) or $this->_db->lastErrorMsg();	
    }
  }
  function __destruct(){
    unset($this->_db);
  }
  function saveNews($title, $category, $description, $source){
    $dt = time();
    $sql = "INSERT INTO msgs(title, category, description, source, datetime)
                VALUES('$title', $category, '$description', '$source', $dt)";
    $ret = $this->_db->exec($sql);
    if(!$ret)
      return false;
    return true;	
  }	
  protected function db2Arr(SQLite3Result $data){
    $arr = [];
    while($row = $data->fetchArray(SQLITE3_ASSOC))
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
      if (!is_object($result)) 
        throw new Exception($this->_db->lastErrorMsg());
      return $this->db2Arr($result);
    }catch(Exception $e){
      return false;
    }
  }	
  public function deleteNews($id){
    try{
      $sql = "DELETE FROM msgs WHERE id = $id";
      $result = $this->_db->exec($sql);
      if (!$result) 
        throw new Exception($this->_db->lastErrorMsg());
      return true;
    }catch(Exception $e){
      echo $e->getMessage();
      return false;
    }
  }
  function clearData($data){
      return $this->_db->escapeString($data); 
  }	
}