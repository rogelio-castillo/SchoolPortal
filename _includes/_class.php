<?php

class _Class extends CommonClass{
	protected static $tableName = "class";
	protected static $vars = array("id","classid","className","archive");
	
	
	public $id;
	public $classid;
	public $className;
	public $archive;
	
	
	public static function find_by_classid($id){
		$class = self::find_by("classid",$id);
		return ($class)? array_shift($class):false;
	}
	
	public static function addClass($postdata){
		global $db;
		global $error;
		
		$user = User::userinfo();
		
		$className = ( isset($postdata["className"]) && $postdata["className"]!="")? $db->validate($postdata["className"]) : $error[]="Invalid Class class name";
		if(!empty($error))return false;
		
		
		$calledClass = get_called_class();
		$class = new $calledClass;
		
		$class->classid=self::get_classid();
		$class->className=$className;
		$class->archive = "0";
		$class->teacher = $user->id;
		$class->create();
		return $class;
	}
	
	public static function getAllClasses(){
		
	}
	
	public static function isValidId($id=""){
		global $db;
		$id = $db->validate($id);
		$query = "SELECT count(*) as count FROM ".self::$tableName." WHERE classid= '{$id}'" ;
		$result_set = $db->query($query);
		$row = $db->fetch_array($result_set);
		
		return $row["count"]==0? true:false;
	}
	
	private static function get_classid(){
		global $db;
		
		$char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$valid = false;
		do{
			$id = "";
			for($i=0; $i<4; $i++){
				$id.=$char[rand(0, strlen($char))];
			}
			$id.="-";
			for($i=0; $i<4; $i++){
				$id.=$char[rand(0, strlen($char))];
			}
			$id.="-";
			for($i=0; $i<4; $i++){
				$id.=$char[rand(0, strlen($char))];
			}
			
			if( empty(self::find_by("classid",$id)) ){ 
				$valid=true; 
			}
		}while(!$valid);
		
		return $id;
		
	}
	
	public static function archive($id){
		$class = self::find_by("classid",$id);
		$class[0]->archive = 1;
		$class[0]->update();
	}
	
	
	
}
?>