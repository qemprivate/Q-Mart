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

	// Upload slider image
	$sliderimg = generateRandomString();
	$allowedExts = array("gif", "jpeg", "jpg", "png");

	$temp = explode(".", $_FILES["simage"]["name"]);
	$extension = end($temp);

	$sliderimg = $sliderimg . "." . $extension;
	move_uploaded_file($_FILES["simage"]["tmp_name"],
	"../../images/slider/" . $sliderimg);
	

	// Add slider image
	$sqlSlider = "INSERT INTO sliderimages (simage) VALUES ('" . $sliderimg . "')";

	try{
		$queryimg = $db->prepare($sqlSlider);

		$queryimg->execute();
		}
		catch(PDOException $ecop) {
		    die($ecop->getMessage());
		}
	


	// Go to edit car page
	$myUrl = "Location: ../index.php?p=slider";
	header($myUrl);

?>