<?php

class UserClass extends commonClass{
	protected static $tableName = "userClass";
	protected static $vars = array("id","classid","userid");
	
	
	public $id;
	public $classid;
	public $userid;
	
	public $classinfo;
	public $parentsCount=0;
	
	public static function add($classid, $userid){
		global $error;
		$class = self::set(array("classid"=>$classid,"userid"=>$userid));
		
		//checking if school class id is real
		if( empty(_Class::find_by("classId",$classid)) ){
			$error[] = "Invalid Class ID";
			return false;
		}
		
		//if class is already added then return the class without adding
		if($userClass=self::find_by_array(array("classid","userid"),array($classid,$userid))){
			return $userClass;
		}
		
		if($class->create()){
			return $class;
		}
		return false;
	}
	
	public static function find_all_by_user_id($id=""){
		global $db;
		$classid = $db->validate($id);
		$sql = "SELECT * FROM `".static::$tableName. "`
				JOIN class ON class.classid = `".static::$tableName. "`.classid
				WHERE `".static::$tableName. "`.userid = '{$id}' AND class.archive=0";
		
		$userClass = self::query($sql);
		foreach($userClass as $index=>$c){
			$c->classinfo = _Class::find_by_classid($c->classid);
			$c->parentsCount = self::parentCount($c->classid);
		}
		
		
		return $userClass;
	}
	
	public static function parentCount($classid){
		global $db;
		$classid = $db->validate($classid);
		$sql = "SELECT count(*) as count FROM `".static::$tableName. "`
				JOIN user ON user.id=userid
				JOIN class ON class.classid = `".static::$tableName. "`.classid
				WHERE `".static::$tableName. "`.classid = '{$classid}' AND user.type=2 AND class.archive=0";
		$row = $db->fetch_array($db->query($sql));
		
		return $row["count"];
	}
	
	public static function get_all_parents_info($classid){
		global $db;
		$classid = $db->validate($classid);
		return User::query("SELECT * FROM `userClass`
							JOIN user ON user.id=userid
							WHERE classid = '{$classid}' AND user.type=2
							ORDER BY firstname ASC");
	}
	
}
?>