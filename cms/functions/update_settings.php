<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {

	header("Location: ../../adminlogin.php");
	}

	include '../../include/config.php';

	$sqlStatment = "UPDATE settings SET "
			. "sitetitle='" . $_POST['wname']
			. "', wdescription='" . $_POST['description']
			. "', wkeywords='" . $_POST['keywords']
			. "', aboutus='" . $_POST['aboutus']
			. "', facebook='" . $_POST['facebook']
			. "', twitter='" . $_POST['twitter']
			. "', linkedin='" . $_POST['linkedin']
			. "', rss='" . $_POST['rss']
			. "', google='" . $_POST['googleplus']
			. "', skype='" . $_POST['skype']
			. "', flickr='" . $_POST['flickr']			
			. "', ccurrency='" . $_POST['ccurrency']
			. "', csymbol='" . $_POST['csymbol']
			. "', langid=" . $_POST['lang'];

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute();
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to profile page
	header("Location: ../index.php?p=settings");

?>