<?php

	include '../../include/config.php';

	$sqlStatment = "INSERT INTO users (fname,address,city,zip,country,phone,email,password,role) VALUES ('" 
			. $_POST['fname'] . "','" 
			. $_POST['address'] . "','" 
			. $_POST['city'] . "','" 
			. $_POST['zip'] . "','" 
			. $_POST['country'] . "','" 
			. $_POST['phone'] . "','" 
			. $_POST['email'] . "','" 
			. $_POST['password'] . "',"
			. $_POST['role'] . ")";
	
	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to login page
	header("Location: ../index.php?p=users");

?>