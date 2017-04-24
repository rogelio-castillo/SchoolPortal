<?php
if(isset($_GET["logout"])){
	User::logout();
	redirect_to("index.php");
}



?>