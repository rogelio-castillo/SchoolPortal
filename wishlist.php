
  	<?php require_once("_includes/init.php"); ?>
	
	<?php
	if(isset($_POST["item"])){
		$class = Wishlist::create($_POST);
		if(!empty($class)){
			printA($class);
		}
	}
	//print_R($_POST);exit;
	if(isset($_POST["signup"])){
		$class = Wishlist::signup($_POST["signup"]);
		if(!empty($class)){
			printA($class);
		}
	}
	
	
	if(!User::isLoggedIn()){
		redirect_to("login.php");
	}
	$user = User::userinfo();
	
	$wishlists = Wishlist::getAllItems();
	
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
				<?php if($user->type!=2) : ?>
				<th>Signup</th>
				<?php endif; ?> 

				
			</tr>
		</thead>
	   <tbody>
			<?php foreach($wishlists as $wishlist) : ?>
			<tr>
			  <th scope="row"><?php echo $wishlist['id'] ?></th>
			  <td><?php echo $wishlist['item'] ?></td>
			  <?php if($user->type!=2) : ?>
				<td>
				<form method="post">
				  <input type='hidden' value="0" name="signup[<?php echo $wishlist['id'] ?>]">

				<input type="checkbox" name="signup[<?php echo $wishlist['id'] ?>]" value="1" onChange="this.form.submit()" <?php if(Wishlist::checkSignup($wishlist['id'])==true){ echo "checked=checked"; }; ?>
/>
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
