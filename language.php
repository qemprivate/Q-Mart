<?php
	
	session_start();

	$_SESSION['lang'] = $_REQUEST['id'];

	// Go to home page
	header("Location: index.php");

	

?>