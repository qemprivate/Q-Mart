<?php
	
	session_start();

	include 'config.php';

	$sqlStatment = "SELECT * FROM admin WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "' AND role = 0";

	
	try{
		$query = $db->query($sqlStatment);

		$query->setFetchMode(PDO::FETCH_ASSOC);

		$row = $query->fetch();

		if ($query->rowCount() > 0) { 

			$_SESSION['admin'] = $row['id'];
			$_SESSION['role'] = $row['role'];
			header("Location: index.php");
		}else
		{
			header("Location: adminlogin.php?err=1");
		}

		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

?>