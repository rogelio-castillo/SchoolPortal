<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CHR Portal</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <?php if( User::isLoggedIn() ){ ?>
      <ul class="nav navbar-nav">
        <li><a href="userinfo.php">User Info</a></li>
        <?php if( isset($_GET["classid"]) ){ ?>
            <li><a href="homework.php?classid=<?php echo $_GET["classid"]; ?>">Homework</a></li>
            <li><a href="to-do-list.php?classid=<?php echo $_GET["classid"]; ?>">To-Do List</a></li>
            <li><a href="message-board.php?classid=<?php echo $_GET["classid"]; ?>">Message Board</a></li>
        <?php } ?>
        <li class="logout"> <a href="<?php echo $_SERVER["PHP_SELF"]."?logout=logout"; ?>">Logout</a> </li>
      </ul>
    <?php }//if user is logged in display menu 
		 ?>
    
    </div><!--/.nav-collapse -->
  </div>
</nav>