
  	<?php require_once("_includes/init.php"); ?>
	
	<?php
	if(!User::isLoggedIn()){
		redirect_to("login.php");
	}
	$user = User::userinfo();
	
	if(!isset($_GET['classid']) || !_Class::isvalid($_GET["classid"])){
		redirect_to("userinfo.php");
	}
	$classid = $_GET["classid"];
	
	if(isset($_POST["item"])){
		$_POST["classid"]=$classid;
		if(!Wishlist::createWishlist($_POST)){
			$error[] = "Wishlist is not created.";
		}
	}
	
	if(isset($_POST["wishlist"])){
		if(!Wishlist::signup($_POST,$user)){
			$error[] = "Signup Error!!";
		}
	}
	
	$wishlists = Wishlist::getAllItems($classid);
	
	?>
	
  	<?php require_once("_files/header.php"); ?>
    
  	<title>Starter Template for Bootstrap</title>
  </head>

  <body>

    <?php require_once("_files/menu.php"); ?>

    <div class="container myContent">
    	
        <img id="site_logo" src='Wishlist.png' alt='The Santa Logo' >
		<div class="clear"></div>
        
		<?php if($user->type==1) : ?>
		<button class="btn btn-success addwishlist" name="addwishlist" type="button" style="margin:20px auto;"> Add Wishlist</button >
		<div class="wishlist" >
			<form action="" method="post">
			   <div class="form-group" style="width: 50%;">
					<label for="wishlist"> Teacher Wishlist</label>
					<textarea class="form-control" name="item" rows="5" id="item"  ></textarea>
					<button class="btn btn-success" name="add" type="submit" style="margin:20px auto;"> Add</button >
				</div>
			</form>
		</div>
        <?php endif; ?> 
    <table class="table table-bordered" >
		<thead>
			<tr>
				<th>#</th>
				<th>Item list</th>
				<?php if($user->type!=1) : ?>
				<th>Signup</th>
				<?php endif; ?> 

				
			</tr>
		</thead>
	   <tbody>
			<?php foreach($wishlists as $index=>$wishlist) : ?>
			<tr>
			  <th scope="row"><?php echo $index+1 ?></th>
			  <td><?php echo $wishlist->item ?></td>
			  <?php if($user->type!=1) : ?>
				<td>
				<form method="post">
				<input type="checkbox" name="signup" onChange="this.form.submit()" 
				<?php if($wishlist->active!="0"){ echo "checked=checked"; }; ?>
/>
				<input type="hidden" name = "wishlist" value = "<?php echo $wishlist->id ?>">
				</form></td>
				<?php endif; ?> 

			</tr>
			<?php endforeach; ?>
		</tbody>
    </table>
	  
		
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
