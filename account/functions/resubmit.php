<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {

	header("Location: ../../adminlogin.php");
	}


	include '../../include/config.php';

	$sqlStatment = "UPDATE cars SET cstatus = 0 WHERE id = " . $_REQUEST['id'];

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to profile page
	header("Location: ../index.php?p=pending");

?>