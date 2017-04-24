<?php

session_start();
$error = array();

function printA($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function redirect_to($link){
	 if ($link != NULL) {
    header("Location: {$link}");
    exit;
  }
}

function print_error(){
	global $error;
	if(empty($error))return false;
	
	$html = "<div class='error'>";
	$html .= "<ul>";
	foreach ($error as $e){
		$html .= "<li> {$e} </li>";
	}
	$html .= "</ul>";
	$html .= "</div>";
	echo $html;
}





?>