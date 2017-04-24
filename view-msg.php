<?php 
	require_once("_includes/init.php");
	if(!User::isLoggedIn()){
		redirect_to("index.php");
	}
	$user = User::userinfo();	
	require_once("_files/header.php"); 
?>
    
  	<title>Message Board</title>
  </head>
  <body>

    <?php require_once("_files/menu.php"); ?>
	
	<?php
	//selecting messages table from database
	$sql="SELECT * FROM reply JOIN messages ON messages.id = reply.message_i";
	$result=$db->query($sql);
	$rows=$db->fetch_array($result);
	?>
    <div class="container myContent">
	<?php
	$sql2="SELECT * FROM reply";
	$result2=$db->query($sql2);
	?>
    //answer table
	<table class="table">
	<thead>
		<tr>
		<th>Reply</th>
		</tr>
	</thead>
    <tbody>
	<?php
	while($rows=$db->fetch_array($result2)){
	?>
      <tr>
        <td>Username:<?php echo $rows['userid'];?></td>
      </tr>
      <tr>
        <td>Message: <?php echo $rows['message'];?></td>
      </tr>
	  <tr>
        <td>Date and time: <?php echo $rows['datetime'];?></td>
      </tr>
	  <?php
	}
	?>
    </tbody>
	</table>
	<br>
	<form action="add-answer.php" method="POST">
    <div class="form-group">
		<label for="to">To:</label>
		<input type="to" name="user_id" class="form-control" id="to" value="<?php echo $user['name']?>">
	</div>
	<div class="form-group">
		<label for="subj">Subject:</label>
		<input type="subject" name="subject" class="form-control" id="sbj" placeholder="Enter a subject">
	</div>
	<div class="form-group">
		<label for="message">Message:</label>
		<textarea class="form-control" name="message" rows="5" id="message" placeholder="Enter message"></textarea>
	</div>
	<button type="submit" class="btn btn-default">Reply</button>
	</form>
	</div>	        
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
