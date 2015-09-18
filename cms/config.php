<?php
ini_set("display_errors", "true"); // Do you want to see the errors ?

$dbhost = "qwikemartcom.fatcowmysql.com";  // Database Host
$dbuser = "qemshop";       // Database User Name
$dbpassword = "t7aranUg";   // User Password
$dbname = "qemshop";       // Database Name

try {
	//$db = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpassword);
	$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch(PDOException $e) {
    echo($e->getMessage());
}


/* Connection string */
// $db = new PDO('mysql:host=localhost;dbname=YOUR_DB_NAME', 'root', 'YOUR_DB_PASSWORD', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 
// $stmt = $db->prepare('select * from your_table');
// $stmt->execute();
 
// Get all records
// $result = $stmt->fetchAll();
 
// echo '<pre>';
// print_r($result); // Show a data array with results

?>