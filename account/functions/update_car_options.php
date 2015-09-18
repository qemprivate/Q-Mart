<?php
	
	session_start();
	if ($_SESSION['admin'] == "") {
    
    header("Location: ../adminlogin.php");
  }


	include '../../include/config.php';

	$sqlStatment = "UPDATE caroptions SET "
			. "co1=" . $_REQUEST['cop1']
			. ", co2=" . $_REQUEST['cop2']
			. ", co3=" . $_REQUEST['cop3']
			. ", co4=" . $_REQUEST['cop4']
			. ", co5=" . $_REQUEST['cop5']
			. ", co6=" . $_REQUEST['cop6']
			. ", co7=" . $_REQUEST['cop7']
			. ", co8=" . $_REQUEST['cop8']
			. ", co9=" . $_REQUEST['cop9']
			. ", co10=" . $_REQUEST['cop10']
			. ", co11=" . $_REQUEST['cop11']
			. ", co12=" . $_REQUEST['cop12']
			. ", co13=" . $_REQUEST['cop13']
			. ", co14=" . $_REQUEST['cop14']
			. ", co15=" . $_REQUEST['cop15']
			. ", co16=" . $_REQUEST['cop16']
			. ", co17=" . $_REQUEST['cop17']
			. ", co18=" . $_REQUEST['cop18']
			. ", co19=" . $_REQUEST['cop19']
			. ", co20=" . $_REQUEST['cop20']
			. ", co21=" . $_REQUEST['cop21']
			. ", co22=" . $_REQUEST['cop22']
			. ", co23=" . $_REQUEST['cop23']
			. ", co24=" . $_REQUEST['cop24']
			. ", co25=" . $_REQUEST['cop25']
			. ", co26=" . $_REQUEST['cop26']
			. ", co27=" . $_REQUEST['cop27']
			. ", co28=" . $_REQUEST['cop28']
			. ", co29=" . $_REQUEST['cop29']
			. ", co30=" . $_REQUEST['cop30']
			. ", co31=" . $_REQUEST['cop31']
			. ", co32=" . $_REQUEST['cop32']

			. " WHERE cid=" . $_REQUEST['cid'];

	try{
		$query = $db->prepare($sqlStatment);

		$query->execute(array(':shortdescription'=>$_REQUEST['shortdescription'], ':description'=>$_REQUEST['description']));
		}
		catch(PDOException $e) {
		    die($e->getMessage());
		}

	// Go to car edit page
	$myUrl = "Location: ../index.php?p=edit&cid=" . $_REQUEST['cid'];
	header($myUrl);

?>