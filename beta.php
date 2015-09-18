<?php
  header('Location: beta');
  
  
  session_start();
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
<title><?php echo $rowSettings['sitetitle']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $rowSettings['wdescription']; ?>">
<meta name="keywords" content="<?php echo $rowSettings['wkeywords']; ?>">
<meta name="author" content="">

<!-- styles -->
<link href="css/q.css?v1.4" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<!-- fav and touch icons -->
<link rel="shortcut icon" href="images/favicon.png">

</head>
<body>
<!-- Header Start -->

    <?php include 'include/homepageheader.php'; ?>

<!-- Header Ends -->



      <!--Sidebar Starts-->

        <?php include 'include/homepagetopproduct.php'; ?>
        
            <!--sidebar Ends-->

   
      





<!-- Footer Starts-->
<footer id="footer">
  <?php include 'include/homefooter.php'; ?>
</footer>



<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>