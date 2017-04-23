<?php 
	require_once("_includes/init.php"); 
	require_once("_files/header.php"); 
?>
    
  	<title>Message Board</title>
  </head>

  <body>

    <?php require_once("_files/menu.php"); ?>
	
	<?php
	//selecting messages table from database
	$tbl_name="messages";
	
	//get value of id that sent from address bar
	$id=$_GET['id'];
	$sql="SELECT * FROM $tbl_name WHERE id='$id'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	?>
    <div class="container myContent">
	<h3>Messages:</h3>
	<table class="table">
	<thead>
      <tr>
        <th><? echo $rows['subject'];?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><? echo $rows['message'];?></td>
      </tr>
      <tr>
        <td>Name: <? echo $rows['name'];?></td>
      </tr>
      <tr>
        <td>Date and time: <? echo $rows['datetime'];?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <h3>Replies:</h3>
	<?php
	//switch to answer table
	$tbl_name2="answer";
	$sql2="SELECT * FROM $tbl_name2 WHERE message_id='$id'";
	$result2=mysql_query($sql2);
	while($rows=mysql_fetch_array($result2)){
	?>
    //answer table
	<table class="table">
    <tbody>
      <tr>
        <td>ID:<? echo $rows['a_id'];?></td>
      </tr>
      <tr>
        <td>Name: <? echo $rows['a_name'];?></td>
      </tr>
      <tr>
        <td>Answer: <? echo $rows['a_answer'];?></td>
      </tr>
	  <tr>
        <td>Date and time: <? echo $rows['a_datetime'];?></td>
      </tr>
    </tbody>
	</table>
	<?php
	}
	
	//switch to messages table
	$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
	$result3=mysql_query($sql3);
	$rows=mysql_fetch_array($result3);
	$view=$rows['view'];
	
	//if have no counter vaule set counter = 1
	if(empty($view)){
		$view=1;
		$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
	}
	
	//count more value
	$addview=$view+1;
	$sql5="UPDATE $tbl_name set view='$addview' WHERE id='$id'";
	$result5=mysql_query($sql5);
	mysql_close();
	?>
	<br>
	<form action="add-answer.php" method= "POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input name="a_name" type="text" class="form-control" id="a_name" placeholder="Enter first and last name.">
    </div>
    <div class="form-group">
      <label for="answer">Answer:</label>
      <textarea class="form-control" rows="5" id="a_answer" placeholder="Enter answer."></textarea>
    </div>
    <div class="form-group">
      <label for="id">ID:</label>
      <input name="id" input type="hidden" value="<? echo $id;?>">
     </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
	</div>	        
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
