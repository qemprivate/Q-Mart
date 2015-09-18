<?php
	
	session_start();

	include '../../include/config.php';

	$nextid = 0;

	// Create random name
	function generateRandomString($length = 25) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}


	// Upload prouct image
	$productimage = generateRandomString();
	$allowedExts = array("gif", "jpeg", "jpg", "png");

	$temp = explode(".", $_FILES["pimage"]["name"]);
	$extension = end($temp);

	$productimage = $productimage . "." . $extension;
	move_uploaded_file($_FILES["pimage"]["tmp_name"],
	"../../images/products/" . $productimage);
	

	// Create SEO 
	function seoUrl($string) {
	    //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
	    $string = strtolower($string);
	    //Strip any unwanted characters
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    return $string;
	}
	$cseo = seoUrl($_POST['ptitle']);

	
	// Get category text
	$sqlCat = "SELECT * FROM cats WHERE id = " . $_POST['cat'];
	$catText = "Unknown";
	
	try{
		$queryCat = $db->query($sqlCat);

		$queryCat->setFetchMode(PDO::FETCH_ASSOC);

		$rowCat = $queryCat->fetch();

		$catText = $rowCat['cat'];

		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}




	// Add product details
	$sqlStatment = "INSERT INTO products (ptitle, nprice, oldprice, catid, cattxt, pdescription, pimage, pseo, 
			shortdesc, sellerid, availability, saleoffer, newused) VALUES ('"
			. $_POST['ptitle'] . "',"
			. $_POST['nprice'] . ","
			. $_POST['oprice'] . ","
			. $_POST['cat'] . ",'"
			. $catText . "',"
			. ":description" . ",'"
			. $productimage . "','"
			. $cseo . "',"
			. ":shortdescription" . ","
			. $_SESSION['admin'] . ","
			. $_POST['availability'] . ",'"
			. $_POST['saleoffer'] . "','"
			. $_POST['newused'] . "')";
			

			

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute(array(':shortdescription'=>$_POST['shortdescription'], ':description'=>$_POST['description']));
				
		$nextid = $db->lastInsertId();

		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}


	// Add product condition
	$sqlcond = "INSERT INTO specifications (pid, speci, pvalue) VALUES (" . $nextid . ",'Condition' ,'" . $_POST['newused'] . "')";

	try{
		$querycond = $db->prepare($sqlcond);

		$querycond->execute();
		}
		catch(PDOException $ecop) {
		    die($ecop->getMessage());
		}


	// Add product image
	$sqlcOp = "INSERT INTO productimages (pid, pimage) VALUES (" . $nextid . ",'" . $productimage . "')";

	try{
		$queryimg = $db->prepare($sqlcOp);

		$queryimg->execute();
		}
		catch(PDOException $ecop) {
		    die($ecop->getMessage());
		}


	// Go to edit car page
	$myUrl = "Location: ../index.php?p=edit&pid=" . $nextid;
	header($myUrl);

?>