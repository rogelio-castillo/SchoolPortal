<?php

class Teacher{
	private static $tableName = "teacher";
	
	public $id;
	public $uid;
	public $firstName;
	public $lastName;
	public $username;
	public $password;
	
	public static function get($uid){
		global $db;
		$query = "SELECT * FROM `".self::$tableName."` WHERE uid='".$uid."' LIMIT 1";
		$result_set = $db->query($query);
		$row = $db->fetch_array($result_set);
		
		$className = get_called_class();
		$parent = new $className;
		$parent->uid=$row["uid"];
		$parent->firstName=$row["firstname"];
		$parent->lastName=$row["lastname"];
		$parent->username=$row["username"];
		$parent->password=$row["password"];
		
		return $parent;
	}
	
	
	
	public static function delete($uid){
		global $db;
		$query = "DELETE FROM `".self::$tableName."` WHERE uid='".$uid."'";
		
		$result_set = $db->query($query);
		return $result_set;
	}
	
	public function create(){
		global $db;
		$query = "INSERT INTO `".self::$tableName."` (`uid`, `firstname`, `lastname`, `username`,`password`) 
				   VALUES ('".
				   			$this->uid."','".
				   			$this->firstname."','".
							$this->lastname."','".
							$this->username."','".
							$this->password."')";
		$result_set = $db->query($query);
		return $result_set;
		
	}
	
	public function update(){
		global $db;
		
		$query = "UPDATE `teacher` SET 
		`firstname` = '".$this->firstname."',
		`lastname` = '".$this->lastName."',
		`password` = '".$this->password."'
		 WHERE `uid` = '".$this->uid."'";
		
		
		$result_set = $db->query($query);
		return $result_set;
	}
	
}
?>