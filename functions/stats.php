<?php
/** incrementUniqueHits **/
function incrementUniqueHits(){
	$sql = mysql_query("SELECT uniqueHits FROM `stats` WHERE `datetime`=CURDATE()");
	$rows = mysql_num_rows($sql);
	if($rows>0)
	{
		$sql_update = mysql_query("UPDATE `stats` SET `uniqueHits`=`uniqueHits`+1 WHERE `datetime`=CURDATE()");
	}
	else
	{
		$sql_insert= mysql_query("INSERT INTO `stats`(`pageViews`, `uniqueHits`,`clicks`, `datetime`) VALUES 	('0','1','0',CURDATE())");
	}
}

/** countViews **/
function countViews($id){	
	$db->query("UPDATE `products` SET `views`=`views`+1 WHERE `id`='$id'");
//	mysql_query("UPDATE `products` SET `views`=`views`+1 WHERE `id`='$id'");
}	

/** countClicks **/
function countClicks($id){
	$db->query("UPDATE `products` SET `clicks`=`clicks`+1 WHERE `id`='$id'");
//	mysql_query("UPDATE `products` SET `clicks`=`clicks`+1 WHERE `id`='$id'");
}	

/** incrementPageViews **/
function incrementPageViews(){
	$sql = mysql_query("SELECT pageViews FROM `stats` WHERE `datetime`=CURDATE()");
	$rows = mysql_num_rows($sql);
	if($rows>0)
	{
		$sql_update = mysql_query("UPDATE `stats` SET `pageViews`=`pageViews`+1 WHERE `datetime`=CURDATE()");
	}
	else
	{
		$sql_insert= mysql_query("INSERT INTO `stats`(`pageViews`, `uniqueHits`,`clicks`, `datetime`) VALUES 	('1','0','0',CURDATE())");
	}
}
?>