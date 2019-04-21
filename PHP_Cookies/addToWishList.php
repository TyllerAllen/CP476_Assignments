<?php
	if(!empty($_GET)){
		if(!empty($_GET['PaintingID']))
	    	$PaintingID = $_GET['PaintingID'];
	    if(!empty($_GET['ImageFileName']))
	    	$ImageFileName = $_GET['ImageFileName'];
	    if(!empty($_GET['Title']))
	    	$Title = $_GET['Title'];
	}

	session_start();
	// always check for existence of session object before accessing it
	if(!isset($_SESSION["wish-list"])){
		$_SESSION["wish-list"] = array();
	}
	$wish = $_SESSION["wish-list"];

	$a = array($PaintingID, $ImageFileName, $Title);
	
	array_push($wish,$a);
	$_SESSION["wish-list"] = $wish;
	header('Location: view-wish-list.php');
?>