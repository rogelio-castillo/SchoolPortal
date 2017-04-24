<?php 
	require_once("_includes/init.php");
	if(!User::isLoggedIn()){
		redirect_to("index.php");
	}
	$user = User::userinfo();
	if($user->type!=1)redirect_to("userinfo.php");
	
	require_once("_files/header.php"); 
?>
    
  	<title>Parents Info</title>
  </head>

  <body>

    <?php require_once("_files/menu.php"); ?>

    <div class="container myContent">
    	<div class="col-md-6">
        	<?php print_error();?>
        </div>
        
        <div class="col-md-12">
            <table class="table">
               <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last  Name</th>
                  <th>Username</th>
                </tr>
              </thead>
               <tbody>
                <?php  
                    $parents = UserClass::get_all_parents_info($_GET["classid"]);
                    if($parents){
                      foreach($parents as $index=>$parent){
                ?>
                    <tr>
                      <td><?php echo $index+1; ?></td>
                      <td><?php echo $parent->firstname; ?></td>
                      <td><?php echo $parent->lastname; ?></td>
                      <td><?php echo $parent->userid; ?></td>
                    </tr>
                   <?php }//foreach ends here
                    }//if ends here 
                   ?>
               </tbody>
            </table>
        </div>
        
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
