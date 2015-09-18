<?php
ini_set("display_errors", "false"); // Do you want to see the errors ?

$dbhost = "qwikemartcom.fatcowmysql.com";  // Database Host
$dbuser = "qemshop";       // Database User Name
$dbpassword = "t7aranUg";   // User Password
$dbname = "qemshop";       // Database Name

try {
	$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch(PDOException $e) {
    echo($e->getMessage());
}

$sqlTopProducts = "SELECT * FROM products WHERE topproduct=1 AND pstatus = 1 ORDER BY RAND() LIMIT 4";	
		$data = $db->query($sqlTopProducts);
?>