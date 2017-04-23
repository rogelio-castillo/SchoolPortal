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

    <div class="container myContent">
	<h2>Messages</h2>
	<p>Create a new message using the form below.</p>
	<form action="add-msg.php" method= "POST">
		<div class="form-group">
			<label for="subj">Subject:</label>
			<input type="subject" name="subject" class="form-control" id="sbj" placeholder="Enter a subject">
		</div>
		<div class="form-group">
			<label for="message">Message:</label>
			<textarea class="form-control" name="message" rows="5" id="message" placeholder="Enter message"></textarea>
		</div>
		<button type="submit" class="btn btn-default">Send Message</button>
	</form>
	</div>	        
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
