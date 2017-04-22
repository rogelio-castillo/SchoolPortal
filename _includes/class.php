<?php

class _Class extends CommonClass{
	protected static $tableName = "class";
	protected static $vars = array("id","classid","className","archive");
	
	
	public $id;
	public $classid;
	public $className;
	public $archive;
	
	
	
	
	
	public static function addClass($postdata){
		global $db;
		$user = User::userinfo();
		
		$error = array();
		$classid = ( isset($postdata["classid"]) && $postdata["classid"]!="")? $db->validate($postdata["classid"]) : $error[]="Invalid Class id";
		if($user->type==1){
			$className = ( isset($postdata["className"]) && $postdata["className"]!="")? $db->validate($postdata["className"]) : $error[]="Invalid Class class name";
		}
		if(!self::isValidId($classid) ) $error[]="Unique class id is already in use.";
		
		if(!empty($error))return $error;
		
		
		$calledClass = get_called_class();
		$class = new $calledClass;
		
		$class->classid=$classid;
		$class->className=$className;
		$class->archive = "0";
		$class->teacher = $user->id;
		$class->create();
		
		return $error;
	}
	
	public static function getAllClasses(){
		global $db;
		$user = User::userinfo();
		if($user->type!=1)return false;
		
		$query = "SELECT * FROM ".self::$tableName." WHERE teacher= '".$user->id."'" ;
		$result_set = $db->query($query);
		return $result_set;
	}
	
	public static function isValidId($id=""){
		global $db;
		$id = $db->validate($id);
		$query = "SELECT count(*) as count FROM ".self::$tableName." WHERE classId= '{$id}'" ;
		$result_set = $db->query($query);
		$row = $db->fetch_array($result_set);
		
		return $row["count"]==0? true:false;
	}
	
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
		$this->id = $db->insert_id();
		
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