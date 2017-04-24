<?php 
	require_once("_includes/init.php");
	if(!User::isLoggedIn()){
		redirect_to("index.php");
	}
	$user = User::userinfo();
	
	if(isset($_GET["remove"])){
		_Class::archive($_GET["remove"]);
		redirect_to("userinfo.php");
	}
	
	//addClass
	if(isset($_POST["addClass"])){
		if($user->type=="1"){//teacher added class
			$class = _Class::addClass($_POST);//adding class to db
			if($class){
				UserClass::add($class->classid,$user->id); //adding class to teacher //possible that more then one teacher is teaching same class ex: TA	
			}
		}else if($user->type=="2"){//parent joind class
			UserClass::add($_POST["classid"],$user->id); //adding class to teacher //possible that more then one teacher is teaching same class ex: TA
		}
	}
	require_once("_files/header.php"); 
?>
    
  	<title>User Info</title>
  </head>

  <body>

    <?php require_once("_files/menu.php"); ?>

    <div class="container myContent">
    	<div class="col-md-6">
        	<?php print_error();?>
        	
            <div class="addClass">
                <button type="button" class="btn btn-info btn-lg col-md-6 show">Add Class</button>
                <span class="clearfix"></span>
                <form class ="form-horizontal" hidden method="post">
                  <?php if($user->type==1){ ?>
                  <div class="form-group col-md-10">
                    <input name="className" type="text" class="form-control" placeholder="CLASS NAME">
                  </div>
                  <?php }else{ ?>
                  		<div class="form-group col-md-10">
                          <input name="classid" type="text" class="form-control" placeholder="CLASS ID">
                        </div>
                  <?php } ?>
                  <div class="form-group col-md-10">
                    <button name="addClass" type="submit" class="btn btn-success">Submit</button>
                  </div>
                </form>
            </div>
        </div>    
        
        <div class="col-md-12">
            <table class="table">
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
        <?php
			$classs = UserClass::find_all_by_user_id($user->id);
			if($classs){
		?>
        <div class="col-md-12">
            <table class="table">
               <thead>
                <tr>
                  <th>#</th>
                  <?php if($user->type==1){//only for teachers ?>
                    <th>Class ID</th>
                  <?php } ?>
                  <th>Class</th>
                  <?php if($user->type==1){//only for teachers ?>
                  <th>Total Parents</th>
                  <?php } ?>
                  <?php if($user->type==1){//only for teachers ?>
                      <th>Archive</th>
                  <?php } ?>
                </tr>
              </thead>
               <tbody>
                <?php  foreach($classs as $index=>$class){ ?>
                    <tr>
                      <td><?php echo $index+1; ?></td>
                      
                      <?php if($user->type==1){//only for teachers ?>
                        <td><a href="class.php?classid=<?php echo $class->classid; ?>"><?php echo $class->classid; ?></a></td>
                      <?php } ?>
                      
                      <td><a href="class.php?classid=<?php echo $class->classid; ?>"><?php echo $class->classinfo->className; ?></a></td>
                      
                      <?php if($user->type==1){//only for teachers ?>
                        <td><a href="parentinfo.php?classid=<?php echo $class->classid; ?>"><?php echo $class->parentsCount; ?></a></td>
                      <?php } ?>
                      
                      <?php if($user->type==1){//only for teachers ?>
                        <td><?php if($class->archive==0){echo '<a href="?remove='.$class->classid.'"> X </a>';}else{echo "Inactive";} ?></td>
                      <?php } ?>
                    </tr>
                   <?php }//foreach ends here ?>
               </tbody>
            </table>
        </div>
        <?php
			}else{//if ends here 
				echo "<div  class='col-md-12'>No Class Found</div>";
			}
		?>
        
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>