<?php 
	require_once("_includes/init.php"); 
	require_once("_files/header.php"); 
?>
    
  	<title>Message Board</title>
  </head>

  <body>

    <?php require_once("_files/menu.php"); ?>

    <div class="container myContent">
	<h2>Messages</h2>
	<p>Create a new message using the form below.</p>
	<form action="add-msg.php" method= "POST">
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Enter first and last name">
		</div>
		<div class="form-group">
			<label for="subj">Subject:</label>
			<input type="subject" class="form-control" id="sbj" placeholder="Enter a subject">
		</div>
		<div class="form-group">
			<label for="message">Message:</label>
			<textarea class="form-control" rows="5" id="message" placeholder="Enter message"></textarea>
		</div>
		<button type="submit" class="btn btn-default">Send Message</button>
	</form>
	</div>	        
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
