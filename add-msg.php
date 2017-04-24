<?php 
	require_once("_includes/init.php");
	if(!User::isLoggedIn()){
		redirect_to("index.php");
	}
	$user = User::userinfo();
	
	if(!isset($_GET["classid"]) || !_CLASS::isvalid($_GET["classid"])){
		redirect_to("userinfo.php");
	}
	$classid = $_GET["classid"];
	
	//get data that sent from form
	$user=User::userinfo();
	$user_id=$user->id;
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$to_user=User::find_by("username",$_POST['user_id']);
	if(empty($to_user)){echo "invalid username";die;}
	$to_id=$to_user[0]->id;
	$datetime=date("d/m/y h:i:s"); //create date time
	
	$sql="INSERT INTO messages(to_id, class_id, user_id, subject, message, datetime)VALUES('{$to_id}','{$classid}', '{$user_id}', '{$subject}', '{$message}', '{$datetime}')";
	$result=$db->query($sql);
	if($result){
		echo"Message has been sent<br>";
		echo"<a href=message-board.php?classid={$classid}>View your messages</a>";
	}
	else{
		echo"There has been a problem with your message.";
	}
?>
