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
	$task=$_POST['task'];
	$date=$_POST['date']; 
	
	//insert form data in todolist table
	$sql="INSERT INTO todolist(classid, task, date) VALUES ('{$classid}', '{$task}','{$date}')";
	
	$result=$db->query($sql);
	if($result){
		redirect_to("to-do-list.php?classid=".$classid);  		
	}
	else{	
		$error[]="Task not inserted";
	}
?>