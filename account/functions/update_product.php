<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {
    
    header("Location: ../adminlogin.php");
  }


	include '../../include/config.php';

	// Get category text
	$sqlCat = "SELECT * FROM cats WHERE id = " . $_REQUEST['cat'];
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


	//Update product data
	$sqlStatment = "UPDATE products SET "
			. "catid=" . $_REQUEST['cat']
			. ", cattxt='" . $catText
			. "', ptitle='" . $_REQUEST['ptitle']
			. "', saleoffer='" . $_REQUEST['saleoffer']
			. "', oldprice=" . $_REQUEST['oprice']
			. ", nprice=" . $_REQUEST['nprice']
			. ", availability=" . $_REQUEST['availability']
			. ", shortdesc = :shortdescription"
			. ", pdescription = :description"

			. " WHERE id=" . $_REQUEST['pid'];

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute(array(':shortdescription'=>$_REQUEST['shortdescription'], ':description'=>$_REQUEST['description']));
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to car edit page
	$myUrl = "Location: ../index.php?p=edit&pid=" . $_REQUEST['pid'];
	header($myUrl);

?>