<?php

class Wishlist{
	private static $tableName = "wishlist";
	private static $vars = array("id","userid","item");
	
	
	public $id;
	public $userid;
	public $item;
	
	
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
	
	public static function getAllItems(){
		global $db;
		//$user = User::userinfo();
		//if($user->type!=1)return false;
				
		//$query = "SELECT * FROM ".self::$tableName." WHERE userid= '".$user->id."'" ;
		$query = "SELECT * FROM ".self::$tableName." " ;
		
		$result_set = $db->query($query);
		$rows = array();
		while(($row = mysqli_fetch_array($result_set))) {
			$rows[] = $row;
		}
		return $rows;
		
	}
	
	
	
	public static function delete($id){
		global $db;
		$id = $db->validate($id);
		$query = "DELETE FROM `".self::$tableName."` WHERE id='".$id."'";
		$result_set = $db->query($query);
		return $result_set;
	}
	
	public function create($post){
		global $db;
		
		
		$query = "INSERT INTO `".self::$tableName."` (";
		$query .= "userid, item";			
		$query .= ")";		
		$query .= "VALUES (";
		//$query .= "'".$user->id."' , '".$post['item']."'";		
		$query .= "1 , '".$post['item']."'";		
		$query .= ")";
		
		//echo $query;exit;
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
	
	public function signup($signupArray){
		global $db;
		
		//print_R($signupArray);exit;
		$wishlistid = key($signupArray)	;
		$checked = $signupArray[$wishlistid];
		
		if($checked==1){
			$query = "REPLACE INTO `signup` (";
			$query .= "userid, wishlistid";			
			$query .= ")";		
			$query .= "VALUES (";
			//$query .= "'".$user->id."' , '".$wishlistid ."'";		
			$query .= "1 , '".$wishlistid ."'";		
			$query .= ")";
		}else{
			//$query = "DELETE FROM `signup` WHERE wishlistid='".$wishlistid."' AND userid= '".$user->id."' ";
			$query = "DELETE FROM `signup` WHERE wishlistid='".$wishlistid."'";
		}
		//echo $query;exit;
		$result_set = $db->query($query);
		return $result_set;
		
	}
	
	public function checkSignup($wishlistid){
		global $db;
			
		//  $query = "SELECT * FROM `signup` WHERE wishlistid=".$wishlistid." AND userid= '".$user->id."'" ;
		$query = "SELECT * FROM `signup` WHERE wishlistid=".$wishlistid."" ;
		$result_set = $db->query($query);
		
		$rows = array();
		while(($row = mysqli_fetch_array($result_set))) {
			$rows[] = $row;
		}
		if(count($rows)>0){
			return true;			
		}
		return false;
	}
	
}
?>