<?php

	include '../include/config.php';
	
	$sqlStatment = "INSERT INTO users (username,email,password, role) VALUES ('" . $_POST['username'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "', 1)";
	
	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to login page
	header("Location: ../login.php");
?>
