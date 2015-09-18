<?php
	
// Select advertising
  $sqlAds = "SELECT * FROM ads";
  
  try{
    $queryAds = $db->query($sqlAds);

    $queryAds->setFetchMode(PDO::FETCH_ASSOC);

    $rowAds = $queryAds->fetch();

    }
    catch(PDOException $e) {
        die($e->getMessage());
    }

?>

<center><?php echo $rowAds['ad250']; ?></center>