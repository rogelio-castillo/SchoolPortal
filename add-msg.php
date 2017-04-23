<?php 
	require_once("_includes/init.php"); 
	
	//get data that sent from form
	
	$name=$_POST['name'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	$datetime=date("d/m/y h:i:s"); //create date time
	
	$sql="INSERT INTO messages(name, subject, message, datetime)VALUES('$name', '$subject', $'message', $'datetime')";
	$result=mysql_query($sql);
	
	if($result){
		echo"Message has been sent<br>";
		echo"<a href=message-board.php>View your messages</a>";
	}
	else{
		echo"There has been a problem with your message.";
	}
	msql_close();
?>
