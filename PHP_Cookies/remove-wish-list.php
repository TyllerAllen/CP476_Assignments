<?php
	if(!empty($_GET)){
		if(!empty($_GET['index']))
	    	$index = $_GET['index'];
	}

	session_start();
	// always check for existence of session object before accessing it
	if(!isset($_SESSION["wish-list"])){
		$_SESSION["wish-list"] = array();
	}
	$wish = $_SESSION["wish-list"];


	if($index == -1)
		$_SESSION["wish-list"] = array();
	else{
		array_splice($wish, $index, 1);
		$_SESSION["wish-list"] = $wish;
	}

	header('Location: view-wish-list.php');
?>