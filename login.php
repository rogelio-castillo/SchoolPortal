<?php  
	require_once("_includes/init.php");
	$teacher = new Teacher();
<<<<<<< HEAD
$teacher->firstname = "Avani";
$teacher->lastname = "Shah"; 
$teacher->uid = "0123456789";
$teacher->username = "ashah";
$teacher->password = "abc"; 

$teacher->create();

print_r(Teacher::get("0123456789"));

	?>

=======
	$teacher->firstname = "shahbaz";
	$teacher->lastname = "surani";
	$teacher->username = "sha";
	$teacher->password = "shap";
	$teacher->create();
	
?>
>>>>>>> 019a3c95ba1ff3888694e3dc9dfcc6acac4ae77e



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

</body>
</html>