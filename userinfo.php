<?php 
	require_once("_includes/init.php");
	//addClass
	if(isset($_POST["addClass"])){
		$class = _Class::addClass($_POST);
		if(!empty($class)){
			printA($class);
		}
	}
	
	if(!User::isLoggedIn()){
		redirect_to("login.php");
	}
	$user = User::userinfo();
	
	_Class::getAllClasses();
	
	require_once("_files/header.php"); 
?>
    
  	<title>User Info</title>
  </head>

  <body>

    <?php require_once("_files/menu.php"); ?>

    <div class="container myContent">
    	<div class="col-md-6">
            <div class="addClass">
                <button type="button" class="btn btn-info btn-lg col-md-6 show">Add Class</button>
                <span class="clearfix"></span>
                <form class ="form-horizontal" hidden method="post">
                  <div class="form-group col-md-10">
                    <input name="classid" type="text" class="form-control" placeholder="UNIQUE CLASS ID">
                  </div>
                  <?php if($user->type==1){ ?>
                  <div class="form-group col-md-10">
                    <input name="className" type="text" class="form-control" placeholder="CLASS NAME">
                  </div>
                  <? } ?>
                  <div class="form-group col-md-10">
                    <button name="addClass" type="submit" class="btn btn-success">Submit</button>
                  </div>
                </form>
            </div>
            
            <div class="col-md-12">
                <table class="table table-bordered">
                   <tbody>
                    <tr>
                      <td>First Name</td>
                      <td><?php echo $user->firstname; ?></td>
                    </tr>
                    <tr>
                      <td>Last  Name</td>
                      <td><?php echo $user->lastname; ?></td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td><?php echo $user->username; ?></td>
                    </tr>
                   </tbody>
                </table>
            </div>
            
            <div class="col-md-12">
                <table class="table table-bordered">
                   <thead>
                    <tr>
                      <th>#</th>
                      
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Username</th>
                    </tr>
                  </thead>
                   <tbody>
                    <tr>
                      <td>First Name</td>
                      <td><?php echo $user->firstname; ?></td>
                    </tr>
                    <tr>
                      <td>Last  Name</td>
                      <td><?php echo $user->lastname; ?></td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td><?php echo $user->username; ?></td>
                    </tr>
                   </tbody>
                </table>
            </div>
            
            
        </div>    
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
