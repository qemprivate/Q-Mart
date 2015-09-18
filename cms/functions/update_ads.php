<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {
    
    header("Location: ../adminlogin.php");
  }

	include '../../include/config.php';

	$sqlStatment = "UPDATE ads SET ad720 = :ad1 , ad250 = :ad2";

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute(array(':ad1'=>$_REQUEST['ad720'], ':ad2'=>$_REQUEST['ad250']));
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to profile page
	header("Location: ../index.php?p=ads");

?>