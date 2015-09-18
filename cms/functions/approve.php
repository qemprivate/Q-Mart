<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {

	header("Location: ../../adminlogin.php");
	}


	include '../../include/config.php';

	$sqlStatment = "UPDATE products SET pstatus = 1 WHERE id = " . $_REQUEST['id'];

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to active page
	header("Location: ../index.php?p=active");

?>