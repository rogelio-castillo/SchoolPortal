<?php 
	require_once("_includes/init.php"); 
	if(!User::isLoggedIn()){
		redirect_to("index.php");
	}
	$user = User::userinfo();
	//get data that sent from form
	$user=User::userinfo();
	$user_id=$user->id;
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	$datetime=date("d/m/y h:i:s"); //create date time
	
	$sql="INSERT INTO messages(user_id, subject, message, datetime)VALUES('{$user_id}', '{$subject}', '{$message}', '{$datetime}')";
	$result=$db->query($sql);
	
	if($result){
		echo"Message has been sent<br>";
		echo"<a href=message-board.php>View your messages</a>";
	}
	else{
		echo"There has been a problem with your message.";
	}
?>
