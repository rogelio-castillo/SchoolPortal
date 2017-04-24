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
		$this->confirm($result_set,$sql);
		return $result_set;
	}
	
	public function confirm($result,$sql){
		if(!$result){
			$output = "Query failed: " . mysqli_connect_errno() . "<br /><br />";
			$output .= "Last SQL query: " . $sql;
			die;
		}
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
	
	public function insert_id() {
	  // get the last id inserted over the current db connection
	  return mysqli_insert_id($this->db);
	}
	
	
}

$db = new Database();

?>