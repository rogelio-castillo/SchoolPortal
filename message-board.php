<?php 
	require_once("_includes/init.php"); 
	require_once("_files/header.php"); 
?>
    
  	<title>Message Board</title>
  </head>

  <body>

    <?php require_once("_files/menu.php"); ?>
	
	//selecting table and order results by id in descending order
	<?php
	$sql="SELECT * FROM messages ORDER BY id DESC";
	$resul=msql_query($sql);
	?>

    <div class="container myContent">
	<h2>Welcome to your Message Board</h2>
	<p>Select from the table below to view or reply to your messages.</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Message</th>
        <th>View</th>
        <th>Reply</th>
        <th>Date/Time</th>
      </tr>
    </thead>
	<?php
	//Start looping table row
	while($rows=mysql_fetch_array($result)){
		?>
		<tbody>
			<tr>
				<td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $row['subject'];?></td>
				<td><?php echo $row['message'];?></td>
				<td><?php echo $row['view'];?></td>
				<td><?php echo $row['reply'];?></td>
				<td><?php echo $row['datetime'];?></td>
			</tr>
		</tbody>
	<?php
    }
	mysql_close(); //exit loop and close connection
	?>
	<thead>
      <tr>
        <th><a href="create-message.php">Create New Message</a></th>
      </tr>
    </thead>
  </table>
	</div>	        
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
