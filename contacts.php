<?php
  
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
<title><?php echo $rowLang['lang6'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">


<link href="css/style.css" rel="stylesheet">


<!-- fav and touch icons -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Inline CSS 
================================================== -->
<style>
.thumbnails{
	margin-left:6px;
}
.thumbnails > li {
    float: left;
    margin-bottom: 20px;
    margin-right: 4px;
	margin-left:4px;
}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/parsley/parsley.min.js"></script>

</head>
<body>
<!-- Header Start -->
<header>

  
  <div class="header-white">

    <?php include 'include/header.php'; ?>


  </div>
</header>
<!-- Header Ends -->
<!--Content starts-->
<div id="maincontainer">

	<div class="container">
		<div class="row">


      <div class="span9">
        <!-- Featured Product-->
        <?php include 'include/contactdetails.php'; ?>
      </div>


</div>
</div>
</div>
<!-- Footer Starts-->
<footer id="footer">
  <?php include 'include/footer.php'; ?>
</footer>


<!-- /maincontainer -->

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-alert.js"></script>
<script src="js/bootstrap-modal.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>
<script src="js/bootstrap-button.js"></script>
<script src="js/bootstrap-collapse.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/bootstrap-typeahead.js"></script>
<script src="js/bootstrap-affix.js"></script>
<script src="js/application.js"></script>
<script src="js/respond.min.js"></script>
<script src="js/cloud-zoom.1.0.2.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script defer src="js/custom.js"></script>

</body>
</html>