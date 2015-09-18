<?php
	
	session_start();

	include '../../include/config.php';

	// Create random name
	function generateRandomString($length = 25) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}


	// Upload product image
	$productimg = generateRandomString();
	$allowedExts = array("gif", "jpeg", "jpg", "png");

	$temp = explode(".", $_FILES["pimage"]["name"]);
	$extension = end($temp);

	$productimg = $productimg . "." . $extension;
	move_uploaded_file($_FILES["pimage"]["tmp_name"],
	"../../images/products/" . $productimg);
	

	// Add product image
	$sqlImage = "INSERT INTO productimages (pid, pimage) VALUES (" . $_REQUEST['pid'] . ",'" . $productimg . "')";

	try{
		$queryimg = $db->prepare($sqlImage);

		$queryimg->execute();
		}
		catch(PDOException $ecop) {
		    die($ecop->getMessage());
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

	// Go to edit car page
	$myUrl = "Location: ../index.php?p=edit&pid=" . $_REQUEST['pid'];
	header($myUrl);

?>