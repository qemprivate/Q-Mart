<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {

	header("Location: ../../adminlogin.php");
	}

	include '../../include/config.php';

	$sqlStatment = "UPDATE users SET "
			. "firstname='" . $_POST['firstname']
			. "', lastname='" . $_POST['lastname']
			. "', username='" . $_POST['username']
			. "', displayname='" . $_POST['displayname']
			. "', address='" . $_POST['address']
			. "', city='" . $_POST['city']
			. "', zip='" . $_POST['zip']
			. "', country='" . $_POST['country']
			. "', phone='" . $_POST['phone']
			. "', email='" . $_POST['email'] . "' WHERE user_id=" . $_REQUEST['user_id'];

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to profile page
	header("Location: ../index.php?p=users");

?>