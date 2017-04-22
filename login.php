<?php  	require_once("_includes/init.php");?>
<?php 
require_once("_includes/init.php");
//check if user was already login 
//redirect to homepage

if(User::isLoggedIn()){
	redirect_to("userinfo.php");
}

if(isset($_POST["register-submit"])){
	$user = User::newUser($_POST);
	if(empty($user)){
		redirect_to("userinfo.php");
	}else{
		//display error
		printA($user);
	}
}

if(isset($_POST["login-submit"])){
	if(isset($_POST["username"]) && $_POST["username"]!="" && isset($_POST["password"]) && $_POST["password"]!="" ) {
		if(User::signin($_POST["username"], $_POST["password"])){
			redirect_to("userinfo.php");
		}else{
			$invalidLogin = true;
		}
	}else{
		$invalidLogin = true;
	}
}



require_once("_files/header.php"); 

?>
  
  <title>Login</title>
  
</head>

  <body>

    <?php require_once("_files/menu.php"); ?>

    <div class="container myContent login">
    	
        <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input 
                                        type="text" 
                                        name="username"
                                         id="username" 
                                        tabindex="1" 
                                        class="form-control" 
                                        placeholder="Username" 
                                        value="<?php if(isset($invalidLogin) && $invalidLogin) echo $_POST["username"]; ?>" 
										<?php if(isset($invalidLogin)) echo 'style="border-color: red"'; ?>
                                         >
									</div>
									<div class="form-group">
										<input 
                                        type="password" 
                                        name="password" 
                                        id="password" 
                                        tabindex="2" 
                                        class="form-control" 
                                        placeholder="Password"
                                        <?php if(isset($invalidLogin)) echo 'style="border-color: red"'; ?>
                                        >
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" method="post" role="form" style="display: none;">
									
                                    <div class="btn-group" data-toggle="buttons" style="margin-bottom:15px;">
                                      <label class="btn btn-secondary">
                                        <input type="radio" name="type" value="1"> Teacher
                                      </label>
                                      <label class="btn btn-secondary">
                                        <input type="radio" name="type" value="2"> Parent
                                      </label>
                                    </div>
                                    
									<div class="form-group">
									  <input type="text" name="firstname" id="firstname" tabindex="2" class="form-control" placeholder="First Name">
									</div>
                                    <div class="form-group">
									  <input type="text" name="lastname" id="lastname" tabindex="2" class="form-control" placeholder="Last Name">
									</div>
                                  	<div class="form-group">
										<input type="text" name="username" id="username" tabindex="2" class="form-control" placeholder="Username" value="">
									</div>
                                    <div class="form-group">
									  <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
                                    <div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div><!-- /.container -->        
    <div class="footer-down">
	<?php require_once("_files/footer.php"); ?>
    <script src="_js/login.js"></script>
    </div>
  </body>
</html>
