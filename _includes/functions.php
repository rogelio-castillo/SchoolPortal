<?php

session_start();

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





?>