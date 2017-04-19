<?php 
	require_once("_includes/init.php");
	if(!User::isLoggedIn()){
		redirect_to("login.php");
	}
	
	require_once("_files/header.php"); 
?>
    
  	<title>Starter Template for Bootstrap</title>
  </head>

  <body>

    <?php require_once("_files/menu.php"); ?>

    <div class="container myContent">

	<?php printA(User::sesion_id()); ?>
        
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
