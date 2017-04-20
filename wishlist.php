
  	<?php require_once("_includes/init.php"); ?>
  	<?php require_once("_files/header.php"); ?>
    
  	<title>Starter Template for Bootstrap</title>
  </head>

  <body>

    <?php require_once("_files/menu.php"); ?>

    <div class="container myContent">
    	
        <img id="site_logo" src='Wishlist.png' alt='The Santa Logo' >
		<div class="clear"></div>
        
		
		<button class="btn btn-success addwishlist" name="addwishlist" type="button" style="margin:20px auto;"> Add Wishlist</button >
		<div class="wishlist" hidden>
			<form>
			   <div class="form-group" style="width: 50%;">
					<label for="wishlist"> Teacher Wishlist</label>
					<textarea class="form-control" name="wishlist" rows="5" id="wishlist"  ></textarea>
					<button class="btn btn-success" name="add" type="button" style="margin:20px auto;"> Add</button >
				</div>
			</form>
		</div>
         
    <table class="table table-bordered" >
		<thead>
			<tr>
				<th>#</th>
				<th>Item list</th>
				<th>sign up</th>
			</tr>
		</thead>
	   <tbody>
			<tr>
			  <th scope="row">1</th>
			  <td>Packs of pencils, Erasers, Packs of stickers, Dry erase markers</td>
			  <td> <div class="checkbox"><label><input name= "check" type="checkbox" value=""></label></div></td>
			</tr>
			<tr>
			  <th scope="row">2</th>
			  <td>Packs of paper, Paper plates, Tissue boxes</td>
			  <td> <div class="checkbox"><label><input name= "check" type="checkbox" value=""></label></div></td>
			</tr>
			<tr>
			  <th scope="row">3</th>
			  <td>Hand soap,Hand sanitize</td>
			  <td> <div class="checkbox"><label><input name= "check" type="checkbox" value=""></label></div></td>
			 </tr>
			<tr>
			  <th scope="row">4</th>
			  <td>Water color paints, glue, art and craft projects</td>
			  <td> <div class="checkbox"><label><input name= "check" type="checkbox" value=""></label></div></td>
			</tr>
		</tbody>
    </table>
	  
	<table class="table table-bordered" >
	  <thead>
		<tr>
		  <th>#</th>
		  <th>Item list</th>
		  <th></th>
		</tr>
	  </thead>
	   <tbody>
			<tr>
			  <th scope="row">1</th>
			  <td>Packs of pencils, Erasers, Packs of stickers, Dry erase markers</td>
			  <td> <button type="button" class="btn btn-default">sign up</button></td>
			</tr>
			<tr>
			  <th scope="row">2</th>
			  <td>Packs of paper, Paper plates, Tissue boxes</td>
			  <td> <button type="button" class="btn btn-default">sign up</button></td>
			</tr>
			<tr>
			  <th scope="row">3</th>
			  <td>Hand soap,Hand sanitize</td>
			  <td> <button type="button" class="btn btn-default">sign up</button></td>
			 </tr>
			<tr>
			  <th scope="row">4</th>
			  <td>Water color paints, glue, art and craft projects</td>
			  <td> <button type="button" class="btn btn-default">sign up</button></td>
			</tr>
		</tbody>
    </table>
	  
		
		
		
		
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
    
  </body>
</html>
