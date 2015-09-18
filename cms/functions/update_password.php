<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {
    
    header("Location: ../adminlogin.php");
  }

	include '../../include/config.php';

	$sqlStatment = "UPDATE users SET "
			. "email='" . $_POST['email']
			. "', password='" . $_POST['password'] . "' WHERE user_id=" . $_SESSION['admin'];

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to profile page
	header("Location: ../index.php?p=password");

?>