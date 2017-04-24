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
	require_once("_files/header.php"); 
?>
    
  	<title>Message Board</title>
  </head>
  <body>

    <?php require_once("_files/menu.php"); 
	
	//selecting table and order results by id in descending order
	$sql="SELECT * FROM messages 
		JOIN user ON user.id=messages.user_id
		WHERE to_id='{$user->id}' AND class_id='{$classid}'
		ORDER BY messages.id DESC";
	$result=$db->query($sql);
	?>

    <div class="container myContent">
		<h2>Welcome to your Message Board</h2>
		<p>View your messages below.</p>
	  <table class="table table-striped">
		<thead>
		  <tr>
			<th>Name</th>
			<th>Subject</th>
			<th>Message</th>
			<th>Date and Time</th>
		  </tr>
		</thead>
			<tbody>
			<?php
			//Start looping table row
			while($rows=$db->fetch_array($result)){
				?>
				<tr>
					<td><?php echo $rows['firstname']." ".$rows['lastname'];?></td>
					<td><?php echo $rows['subject'];?></td>
					<td><?php echo $rows['message'];?></td>
					<td><?php echo $rows['datetime'];?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>	
		<div><a href="create-message.php?classid=<?php echo $classid ?>">Create New Message</a>
		</div>
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
