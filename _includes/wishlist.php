<?php

class Wishlist{
	private static $tableName = "wishlist";
	private static $vars = array("id","classid","parentid","itemlist");
	
	
	public $id;
	public $classid;
	public $parentid;
	public $itemlist;
	
	
	
	//common class
	public static function set($array){
		$calledClass = get_called_class();
		$class = new $calledClass;
		
		foreach(self::$vars as $index=>$variable){
			if(isset($array[$variable])){
				$class->{$variable} = $array[$variable];
			}
		}
		return $class;
	}
	
	public static function delete($id){
		global $db;
		$id = $db->validate($id);
		$query = "DELETE FROM `".self::$tableName."` WHERE id='".$id."'";
		$result_set = $db->query($query);
		return $result_set;
	}
	
	public function create(){
		global $db;
		$query = "INSERT INTO `".self::$tableName."` (";
		foreach(self::$vars as $index=>$variable){
			$query .= "`".$variable."`";
			if($index!=sizeof(self::$vars)-1){
				$query.=", ";
			}
		}
		$query .= ")";		
		$query .= "VALUES (";
		foreach(self::$vars as $index=>$variable){
			$query .= "'".$this->{$variable} . "'";
			if($index!=sizeof(self::$vars)-1){
				$query.=", ";
			}
		}
		$query .= ")";
		$result_set = $db->query($query);
		return $result_set;
		
	}
	
	public function update(){
		global $db;
		$query = "UPDATE `".self::$tableName."` SET ";
		foreach(self::$vars as $index=>$variable){
			$query .= "`".$variable."` = '". $this->{$variable}."'";
			if($index!=sizeof(self::$vars)-1){
				$query.=", ";
			}
		}
		$query.= " WHERE `id` = '".$this->id."'";
		$result_set = $db->query($query);
		return $result_set;
	}
	
	
	
}
?>