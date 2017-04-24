<?php

class Wishlist extends commonClass{
	protected static $tableName = "wishlist";
	protected static $vars = array("id","userid","item","active","classid");
	
	
	public $id;
	public $userid;
	public $item;
	public $active;
	public $classid;
	
	public static function getAllItems($classid){
		global $db;
		$user = User::userinfo();
		if($user->type==1){
			return self::find_by_array(array("userid","classid"),array($user->id,$classid));
		}
		
		$query = "SELECT * FROM ".self::$tableName." WHERE classid='".$classid."' AND (active='0' OR active='{$user->id}')" ;
		$result_set = $db->query($query);
		$rows = array();
		while(($row = $db->fetch_array($result_set))) {
			$rows[] = self::set($row);
		}
		return (!empty($rows))? $rows:false;
	}
	
	public function createWishlist($post){
		global $db;
		$user = User::userinfo();
		$post["userid"] = $user->id;
		$post["active"] = 0;
		
		$wishlist = self::set($post);
		return $wishlist->create();
	}
	
	public function signup($post,$user=""){
		$wishlist = self::find_by_id($post["wishlist"]);
		
		if(isset($post["signup"])){
			$wishlist->active = $user->id;
		}else{
			$wishlist->active = 0;
		}
		return $wishlist->update();
	}
	
	public function checkSignup($id){
		$wishlist  = self::find_by_id($id);
		return ($wishlist->active!=0)?true:false;
	}
	
}
?>