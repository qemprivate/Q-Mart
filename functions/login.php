<?php
	
	session_start();

	include '../include/config.php';

	$sqlStatment = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "' AND role = 1";

	
	try{
		$query = $db->query($sqlStatment);

		$query->setFetchMode(PDO::FETCH_ASSOC);

		$row = $query->fetch();

		if ($query->rowCount() > 0) { 

			$_SESSION['admin'] = $row['user_id'];
			$_SESSION['role'] = $row['role'];
			header("Location: /account");
		}else
		{
			header("Location: ../login.php?err=1");
		}

		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

?>