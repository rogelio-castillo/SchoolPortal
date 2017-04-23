<?php 
	require_once("_includes/init.php"); 
	
	//get value of id that was sent from hidden field in form
	$id=$_POST['id'];
	
	//find highest answer number
	$sql="SELECT MAX(a_id) AS Maxa_id FROM answer WHERE question_id='$id'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	
	//add + 1 to highest answer number and keep it in variable name "$Max_id" if there is no answer yet set it = 1
	if($rows){
		$Max_id=$rows['Maxa_id'] + 1;
	}
	else{
		$Max_id=1;
	}
	
	//get values sent from form
	$a_name=$_POST['a_name'];
	$a_answer=$_POST['a_answer'];
	
	$datetime=date("d/m/y h:i:s"); //create date time
	
	//insert answer
	$sql2="INSERT INTO answer(message_id, a_id, a_name, a_answer, a-datetime)VALUES('$id', '$Max_id', $'a_name', '$a_answer', $'datetime')";
	$result2=mysql_query($sql2);
	
	if($result2){
		echo"Succesful.<br>";
		echo"<a href=view-msg.php>View your answer</a>";
		
		//if added new answer, add value + 1 in reply column
		$table_name2="messages";
		$sql3="UPDATE $table_name2 SET reply='$Max_id' WHERE id='$id'";
		$result3=mysql_query()$sql3;
	}
	else{
		echo"There has been a problem.";
	}
	msql_close();
?>
