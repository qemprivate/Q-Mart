<?php

// Function to logout - destroy all Cookies and Session
function processLogout() {
	// Start Session
	session_start();
	// Destroy all Cookies from this site
	if(isset($_SERVER['HTTP_COOKIE'])) {
		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
		$expire = time()+86400;
		foreach($cookies as $cookie) {
			$parts = explode('=', $cookie);
			$name = trim($parts[0]);
			setcookie($name, '', $expire);
			setcookie($name, '', $expire, '/');
		}
	}
	// Destroy all Session from this site
	$_SESSION = array();
	session_destroy();
	unset($_SESSION);
	// Redirect to login.php
	header('Location: ../login.php');
}

// Call processLogout function for logout
processLogout();

/*
	session_start();
	$_SESSION['admin'] = "";
	
	if ($_SESSION['role'] == 0) {
		$_SESSION['role'] = "";
		header("Location: ../adminlogin.php");
	}else{
		$_SESSION['role'] = "";
		header("Location: ../login.php");
	}
	*/
	
	session_start();
	session_destroy();
	header("Location:../login.php");
?>