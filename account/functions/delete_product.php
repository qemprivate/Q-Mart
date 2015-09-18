<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {

	header("Location: ../../adminlogin.php");
	}


	include '../../include/config.php';

	// Delete product data
	$sqlStatment = "DELETE FROM products WHERE id = " . $_REQUEST['id'];

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Delete car options
	// $sqlcop = "DELETE FROM caroptions WHERE cid = " . $_REQUEST['id'];

	// try{
	// 	$querycop = $db->prepare($sqlcop);

	// 	$querycop->execute();
	// 	}
	// 	catch(PDOException $e) {
	// 	    die($e->getMessage());
	// 	}

	// Go to profile page
	header("Location: ../index.php");

?>