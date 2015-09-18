<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {

	header("Location: ../../adminlogin.php");
	}


	include '../../include/config.php';

	$sqlStatment = "INSERT INTO specifications (pid, speci, pvalue) VALUES (" 
		. $_REQUEST['pid'] . ",'"
		. $_REQUEST['specification'] . "','"
		. $_REQUEST['svalue'] . "')";

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to product edit page
	$myUrl = "Location: ../index.php?p=edit&pid=" . $_REQUEST['pid'];
	header($myUrl);

?>