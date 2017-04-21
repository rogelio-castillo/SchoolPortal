<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CHR</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <?php if( User::isLoggedIn() ){ ?>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">User Info</a></li>
        <li><a href="#about">Homework</a></li>
        <li><a href="#contact">To-Do List</a></li>
        <li><a href="#contact">WishList</a></li>
        <li><a href="#contact">Message Board</a></li>
        <li class="logout"> <a href="<?php echo $_SERVER["PHP_SELF"]."?logout=logout"; ?>">Logout</a> </li>
      </ul>
    <?php }//if user is logged in display menu 
		 ?>
    
    </div><!--/.nav-collapse -->
  </div>
</nav>