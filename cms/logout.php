<?php
	session_start();
	$_SESSION['admin'] = "";
	
	if ($_SESSION['role'] == 0) {
		$_SESSION['role'] = "";
		header("Location: adminlogin.php");
	}else{
		$_SESSION['role'] = "";
		header("Location: login.php");
	}
?>