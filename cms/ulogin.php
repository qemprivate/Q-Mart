<?php
	
	session_start();

	include '../include/config.php';

	$sqlStatment = "SELECT * FROM users WHERE email = '" 
			. $_POST['email'] . "' AND password = '" 
			. $_POST['password'] . "' AND urole = 1";

	
	try{
		$query = $db->query($sqlStatment);

		$query->setFetchMode(PDO::FETCH_ASSOC);

		$row = $query->fetch();

		if ($query->rowCount() > 0) { 

			$_SESSION['admin'] = $row['id'];
			$_SESSION['urole'] = $row['urole'];
			header("Location: index.php");
		}else
		{
			header("Location: ../adminlogin.php?err=1");
		}

		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

?>