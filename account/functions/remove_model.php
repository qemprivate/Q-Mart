<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {
    
    header("Location: ../adminlogin.php");
  }

	include '../../include/config.php';

	$sqlStatment = "DELETE FROM cats WHERE id = " . $_REQUEST['id'];

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to profile page
	$myUrl = "Location: ../index.php?p=models&manid=" . $_REQUEST['manid'];
	header($myUrl);

?>