<?
class Database{
	
	public $db;
	
	function __construct(){
		$this->db = mysqli_connect("localhost", "root", "Rocky786@@@", "parent_teacher");
		if(mysqli_connect_errno()){
			die("Database connection failed: " . mysqli_connect_errno());
		}else{
			echo "success";
		}
	}
}

$db = new Database();

?>