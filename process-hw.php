<?php 
	require_once("_includes/init.php");
	//printA($_POST); die;
	if(!User::isLoggedIn()){
		redirect_to("index.php");
	}
	$user = User::userinfo();
	
	if(!isset($_GET["classid"]) || !_CLASS::isvalid($_GET["classid"])){
		redirect_to("userinfo.php");
	}
	
	$classid = $_GET["classid"];
	$description=$_POST['description'];
	$date=$_POST['date']; 
	
	//insert form data in homework table
	$sql="INSERT INTO homework(classid, description, date) VALUES ('{$classid}', '{$description}','{$date}')";
	
	$result=$db->query($sql);
	if($result){
		redirect_to("homework.php?classid=".$classid);  		
	}
	else{	
		$error[]="Task not inserted";
	}
?>