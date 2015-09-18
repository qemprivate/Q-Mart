<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {

	header("Location: ../../adminlogin.php");
	}


	include '../../include/config.php';

	

	// Delete product image
	$sqlimg = "DELETE FROM productimages WHERE id = " . $_REQUEST['id'];

	try{
		$query = $db->prepare($sqlimg);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}


	//Select new default image
	$sqlNewImage = "SELECT * FROM productimages WHERE pid=" . $_REQUEST['pid'];
	try{
		$query = $db->query($sqlNewImage);

		$query->setFetchMode(PDO::FETCH_ASSOC);

		$row = $query->fetch();

		if ($query->rowCount() > 0) { 

			$newIMG = $row['pimage'];

		}else
		{
			$newIMG = "default.png";
		}

		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}


	//Set the default image
	$sqlUpdateImage = "UPDATE products SET pimage = '" . $newIMG . "' WHERE id = " . $_REQUEST['pid'];

	try{
		$query = $db->prepare($sqlUpdateImage);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to car edit page
	$myUrl = "Location: ../index.php?p=edit&pid=" . $_REQUEST['pid'];
	header($myUrl);

?>