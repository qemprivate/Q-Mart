<?php


	include '../include/config.php';

	$sqlStatment = "INSERT INTO reviews (pid, rtitle, rrate, rdesc, rdate) VALUES (" 
		. $_REQUEST['pid'] . ",'"
		. $_REQUEST['rtitle'] . "',"
		. $_REQUEST['rrate'] . ",'"
		. $_REQUEST['rdesc'] . "','"
		. date("Y/m/d") . "')";

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to product edit page
	$myUrl = "Location: ../product.php?id=" . $_REQUEST['pid'];
	header($myUrl);

?>