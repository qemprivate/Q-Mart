<?php
 ini_set("display_errors", "true"); // Do you want to see the errors ?
 
  //session_start();

  include 'include/config.php';

  // Select settings
  $sqlSettings = "SELECT * FROM settings";
  
  try{
    $querySettings = $db->query($sqlSettings);

    $querySettings->setFetchMode(PDO::FETCH_ASSOC);

    $rowSettings = $querySettings->fetch();

    }
    catch(PDOException $e) {
        die($e->getMessage());
    }

// Select language

    if ($_SESSION['lang'] == "") {
      $_SESSION['lang'] = $rowSettings['langid'];
    }
    
  $sqlSettings = "SELECT * FROM languages WHERE id = " . $_SESSION['lang'];
  
  try{
    $queryLang = $db->query($sqlSettings);

    $queryLang->setFetchMode(PDO::FETCH_ASSOC);

    $rowLang = $queryLang->fetch();

    }
    catch(PDOException $e) {
        die($e->getMessage());
    }

?>

<!DOCTYPE html>
<html lang="<?php echo $rowLang['langchar'];?>" dir="<?php echo $rowLang['dircetionx'];?>">

<head>
<meta charset="utf-8">
<title><?php echo $rowLang['lang17'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- styles -->
<link href="css/style.css" rel="stylesheet">

<!-- Slider -->
<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />

<!-- Icon -->


<!-- fav and touch icons -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Inline CSS 
================================================== -->


</head>
<body>


        <!-- Featured Product-->
        <?php include 'include/reg.php'; ?>
      
<!-- Footer Starts-->
<footer id="footer">
</footer>


</body>
</html>