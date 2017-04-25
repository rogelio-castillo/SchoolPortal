<?php
    require_once("_includes/init.php");
    
    if(!User::isLoggedIn()){
        redirect_to("index.php");
    }
    $user = User::userinfo();
    
   if(!isset($_GET["classid"]) || !_CLASS::isvalid($_GET["classid"])){
        redirect_to("userinfo.php");
   }
    $classid = $_GET["classid"];
	
    $subject = $classid;
    $title=$_POST['title'];
    $description=$_POST['description'];
    $dueDate=$_POST['dueDate'];
    
    //insert form data in todolist table
    $sql="INSERT INTO Homework(classid, subject, title, description, dueDate) VALUES ('{$classid}', '{$subject}','{$title}','{$description}','{$dueDate}')";
    
    $result=$db->query($sql);
    if($result){
        redirect_to("homework.php?classid=".$classid);
    }
    else{	
        $error[]="Unable to generate homework";
    }
    ?>