<?php
class Database{
	
	public $db;
	
	function __construct(){
		$this->db = mysqli_connect("localhost", "root", "", "parent_teacher");
		if(mysqli_connect_errno()){
			die("Database connection failed: " . mysqli_connect_errno());
		}
	}
	
	public function query($sql=""){
		$result_set = mysqli_query($this->db,$sql);
		return $result_set;
	}
	
	public function fetch_array($result_set){
		return mysqli_fetch_array($result_set);
	}
	
	public function validate($string){
		if( get_magic_quotes_gpc() ) { 
			$value = stripslashes( $string );
			$value = mysqli_real_escape_string( $this->db, $string );
		}
		return $string;
	}
	
}

$db = new Database();

?>