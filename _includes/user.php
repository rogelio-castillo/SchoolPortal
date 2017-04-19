<?php

class User{
	private static $tableName = "user";
	public $vars = array("id","username","password","firstname","lastname","type","class");
	
	
	public $id;
	public $username;
	public $password;
	public $firstname;
	public $lastname;
	public $type;
	public $class;
	
	public static function sesion_id(){
		if(!self::isLoggedIn())return false;
		printA( self::get($_SESSION["userid"]) );die;
		return self::get($_SESSION["userid"]);
	}
	
	public static function isLoggedIn(){
		return (isset($_SESSION["userid"]) || $_SESSION["userid"]!="")? true:false;
	}
	
	public static function get($id){
		global $db;
		$id = $db->validate($id);
		
		$query = "SELECT * FROM `".self::$tableName."` WHERE id='".$id."' LIMIT 1";
		$result_set = $db->query($query);
		$row = $db->fetch_array($result_set);
		if(empty($row))return false;
		
		$className = get_called_class();
		$user = new $className;
		foreach($user->vars as $variable){
			$user->{$variable} = $row[$variable];
		}
		return $user;
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
		foreach($this->vars as $index=>$variable){
			$query .= "`".$variable."`";
			if($index!=sizeof($this->vars)-1){
				$query.=", ";
			}
		}
		$query .= ")";		
		$query .= "VALUES (";
		foreach($this->vars as $index=>$variable){
			$query .= "'".$this->{$variable} . "'";
			if($index!=sizeof($this->vars)-1){
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
		foreach($this->vars as $index=>$variable){
			$query .= "`".$variable."` = '". $this->{$variable}."'";
			if($index!=sizeof($this->vars)-1){
				$query.=", ";
			}
		}
		$query.= " WHERE `id` = '".$this->id."'";
		$result_set = $db->query($query);
		return $result_set;
	}
	
	public static function newUser($postData){
		global $db;
		
		$error = array();
		$firstname = (isset($postData["firstname"]) && $postData["firstname"]!="")? $db->validate( $postData["firstname"] ):$error[]="First name is not set";
		$lastname = (isset($postData["lastname"])   && $postData["lastname"]!="")? 	$db->validate( $postData["lastname"] ):	$error[]="Last name is not set";
		$type = (isset($postData["type"])   	&& ($postData["type"]=="1" || $postData["type"]=="2" ))? 				$db->validate( $postData["type"] ):		$error[]="Type is Invalid";
		$username = (isset($postData["username"])   && $postData["username"]!="")? 	$db->validate( $postData["username"] ):	$error[]="Username name is not set";
		$password = (isset($postData["password"])   && $postData["password"]!="")? 	$db->validate( $postData["password"] ):	$error[]="Password is not set";
		$confirmPassword = (isset($postData["confirm-password"]) && $postData["confirm-password"]===$postData["password"])? 	$db->validate( $postData["confirm-password"] ):$error[]="Confirm password is not set";
		if(!empty($error)) return $error;
		
		if(!self::isUserValid($username)) $error[]="Username is invalid";	if(!empty($error)) return $error;
		
		$className = get_called_class();
		$user = new $className;
		
		$user->firstname = $firstname;
		$user->lastname = $lastname;
		$user->username = $username;
		$user->password = hash("sha256",$password);
		$user->type = $type;
		$user->id=$user->getId();
		
		$user->create();
		
		self::signin($username,$password);
		return $error;
	}
	
	public static function isUserValid($username){
		global $db;
		$username = $db->validate($username);
		
		if($username=="")return false;
		$query = "SELECT count(*) as count FROM `".self::$tableName."` WHERE username='".$username."'";
		$result_set = $db->query($query);
		$row = $db->fetch_array($result_set);
		
		return ($row["count"]==0)? true:false;
	}
	
	public function getId(){
		global $db;
		
		$char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$valid = false;
		do{
			$id = "";
			for($i=0; $i<8; $i++){
				$id.=$char[rand(0, strlen($char))];
			}
			$id.="-";
			for($i=0; $i<7; $i++){
				$id.=$char[rand(0, strlen($char))];
			}
			$id.="-";
			for($i=0; $i<5; $i++){
				$id.=$char[rand(0, strlen($char))];
			}
			
			$query = "SELECT count(*) as count FROM `".self::$tableName."` WHERE id='".$id."'";
			$result_set = $db->query($query);
			$row = $db->fetch_array($result_set);
			if($row["count"]==0)$valid=true;
		}while(!$valid);
		
		return $id;
	}
	
	public static function signin($username, $password){
		global $db;
		
		$username = $db->validate($username);
		$password = hash("sha256",$db->validate($password));
		
		$query = "SELECT id FROM `".self::$tableName."` WHERE username='{$username}' AND password='{$password}' LIMIT 1";
		$result_set = $db->query($query);
		$row = $db->fetch_array($result_set);
		if(empty($row))return false;
		
		$_SESSION["userid"]=$row["id"];
		return true;
	}
	
	public static function logout(){
		if(!isset($_SESSION["userid"]))return true;
		unset($_SESSION["userid"]);return true;
	}
	
	
}
?>