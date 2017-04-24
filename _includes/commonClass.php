<?php

class CommonClass{
	protected static $tableName;
	protected static $vars;
	
	
	public static function find_by_id($id){
		global $db;
		$id = $db->validate($id);
		$row = self::query("SELECT * FROM ".static::$tableName. " WHERE id = '{$id}'");
		return $row[0];
	}
	
	public static function find_by($key,$value){
		global $db;
		$id = $db->validate($key);
		$value = $db->validate($value);
		return self::query("SELECT * FROM ".static::$tableName. " WHERE {$key} = '{$value}'");
	}
	
	public static function find_by_array($key=array(),$value=array()){
		global $db;
		global $error;
		
		if(sizeof($key)!=sizeof($value)){
			$error[] = "Invalid key value size in find by array";
			return false;
		}
		
		$id = $db->validate($key);
		$value = $db->validate($value);
		$sql = "SELECT * FROM ".static::$tableName. " WHERE ";
		foreach($key as $index=>$k){
			$sql.= "{$db->validate($k)} = '{$db->validate($value[$index])}' ";
			if(sizeof($key)-1>$index){
				$sql.=" AND ";
			}
		}
		
		return self::query($sql);
	}
	
	public static function find_all(){
		global $db;
		return self::query("SELECT * FROM ".static::$tableName);
	}
	
	public static function set($array){
		global $db;
		$calledClass = get_called_class();
		$class = new $calledClass;
		
		foreach(static::$vars as $index=>$variable){
			if(isset($array[$variable])){
				$class->{$variable} = $db->validate($array[$variable]);
			}
		}
		return $class;
	}
	
	public static function query($sql=""){
		global $db;
		$result = $db->query($sql);
		$obj = array();
		while($row = $db->fetch_array($result)){
			$obj[] = self::set($row);
		}
		return $obj;
	}
	
	public function create(){
		global $db;
		$query = "INSERT INTO `".static::$tableName."` (";
		foreach(static::$vars as $index=>$variable){
			$query .= "`".$variable."`";
			if($index!=sizeof(static::$vars)-1){
				$query.=", ";
			}
		}
		$query .= ")";		
		$query .= "VALUES (";
		foreach(static::$vars as $index=>$variable){
			$query .= "'".$db->validate($this->{$variable}) . "'";
			if($index!=sizeof(static::$vars)-1){
				$query.=", ";
			}
		}
		$query .= ")";
		$result_set = $db->query($query);
		$this->id = $db->insert_id();
		
		return $result_set;
		
	}
	
	public function update(){
		global $db;
		$query = "UPDATE `".static::$tableName."` SET ";
		foreach(static::$vars as $index=>$variable){
			$query .= "`".$variable."` = '". $db->validate($this->{$variable})."'";
			if($index!=sizeof(static::$vars)-1){
				$query.=", ";
			}
		}
		$query.= " WHERE `id` = '".$this->id."'";
		$result_set = $db->query($query);
		return $result_set;
	}
	
	public function delete(){
		global $db;
		$query = "DELETE FROM `".static::$tableName."` WHERE id='".$this->id."'";
		$result_set = $db->query($query);
		return $result_set;
	}
	
	
	
}
?>