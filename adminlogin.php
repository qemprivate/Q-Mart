<?php
  
  session_start();

  include 'include/config.php';
  
  if ($_REQUEST['err'] != "") {

        $sentmsg = "<p><center><div>Invalid Email Address or Password</div></center></p>";
    }

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
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300' rel='stylesheet' type='text/css'>

<!-- styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/docs.css" rel="stylesheet">
<link href="js/google-code-prettify/prettify.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<!-- Parsley JS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/parsley/parsley.min.js"></script>

<!-- Slider -->
<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

<!-- Icon -->
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

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
</head>
<body>
<!-- Header Start -->
<header>
  <!-- Sticky Navbar Start -->
  <?php include 'include/topnav.php'; ?>
  <!--Sticky Navbar End -->
  
  <div class="header-white">

    <?php include 'include/header.php'; ?>

    <!-- Navigation Start -->
    <?php include 'include/menu.php'; ?>
    <!-- Navigation Ends -->
  </div>
</header>
<!-- Header Ends -->
<!--Content starts-->
<div id="maincontainer">

	<div class="container">
		<div class="row">
        	<!--Sidebar Starts-->
			<div class="span3">

				<?php include 'include/ads.php'; ?>
        <?php include 'include/cats.php'; ?>
				<?php include 'include/topproducts.php'; ?>
        <?php include 'include/bestoffer.php'; ?>
				
			</div>
            <!--sidebar Ends-->

      <div class="span9">
        <section id="featured">
          <h1 class="productname">Admin Login</h1>
          <section class="returncustomer">
            <div class="loginbox">
              <center><?php echo $sentmsg; ?></center>
              <form class="form-vertical" action="cp/login.php" method="POST" data-parsley-validate>
                <fieldset>
                  <div class="control-group">
                    <label class="control-label"><?php echo $rowLang['lang28'];?>:</label>
                    <div class="controls">
                      <input type="email" name="email" class="span3" data-parsley-length="[5, 75]" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label"><?php echo $rowLang['lang29'];?>:</label>
                    <div class="controls">
                      <input type="password" name="password" id="password" class="span3" data-parsley-length="[5, 25]" required>
                    </div>
                  </div>
                  <br>
                  <br>
                  <button type="submit" class="btn btn-success"><?php echo $rowLang['lang5'];?></button>
                </fieldset>
              </form>
            </div>
          </section>
        </section>
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
<script type="text/javascript">
$(window).load(function () {
  $('#slider').nivoSlider();
});
</script>
</body>
</html>