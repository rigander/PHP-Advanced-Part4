<?php
include "INewsDB.class.php";
include "DB.class.php";
class NewsDB implements INewsDB{
	protected $_db;
	function __construct(){
		$this->_db = new DB;
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
	protected function db2Arr($data){
		$arr = array();
		while($row = $this->_db->fetch($data, SQLITE3_ASSOC))
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
				throw new Exception($this->_db->getError());
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
				throw new Exception($this->_db->getError());
			return true;
		}catch(Exception $e){
			echo $e->getMessage();
			return false;
		}
	}
	function clearData($data){
		return $this->_db->escape($data); 
	}	
}
?>