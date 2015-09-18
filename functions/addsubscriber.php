<?php


	include '../include/config.php';

	$sqlStatment = "INSERT INTO subscribers (subscriber) VALUES ('"  . $_REQUEST['subscriber'] . "')";

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to product edit page
	$myUrl = "Location: ../index.php";
	header($myUrl);

?>