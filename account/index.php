<?php
  
if(!isset($_SESSION)) 
session_start();
  
  if ($_SESSION['admin'] == "") {
 // if(isset($_SESSION['username'])) {
    
    header("Location: ../login.php");
  }

  include 'config.php';

  //Select Ads
    $sqlAds = "SELECT * FROM ads";
        
    try{
        $queryAds = $db->query($sqlAds);

        $queryAds->setFetchMode(PDO::FETCH_ASSOC);

        $rowAds = $queryAds->fetch();

        }
        catch(PDOException $e) {
            die($e->getMessage());
        }

  $page = $_REQUEST['p'];
  $productid= $_REQUEST['pid'];
  $manid= $_REQUEST['manid'];
  $mmodel= $_REQUEST['model'];
  $uid= $_REQUEST['uid'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-TileColor" content="#5bc0de">
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/Font-Awesome/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/lib/datatables/css/DT_bootstrap.css">

    <link rel="stylesheet" href="assets/lib/inputlimiter/jquery.inputlimiter.1.0.css">
    <link rel="stylesheet" href="assets/lib/chosen/chosen.min.css">
    <link rel="stylesheet" href="assets/lib/tagsinput/jquery.tagsinput.css">
    <link rel="stylesheet" href="assets/lib/switch/static/stylesheets/bootstrap-switch.css">
    <link rel="stylesheet" href="assets/lib/jasny/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/flick/jquery-ui.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../js/parsley/parsley.min.js"></script>

    <?php
    if ($_REQUEST['p'] == "new" || $_REQUEST['p'] == "edit"){
    ?>
    <script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: "preview textcolor media table visualblocks visualchars textpattern spellchecker",
        toolbar: "spellchecker inserttable visualchars forecolor preview"
     });
    </script>
    <?php } ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
      <![endif]-->


  </head>
  <body>
    <div id="wrap">
      <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">

          <!-- Brand and toggle get grouped for better mobile display -->
          <header class="navbar-header">
            
            <a href="index.php" class="navbar-brand">
              <h3> Control Panel</h3>
            </a>
          </header>

          <!-- Top Nav -->
          <?php include 'includes/topnav.php' ?>

          <!-- Nav Bar -->
          <?php include 'includes/navbar.php' ?>

        </nav><!-- /.navbar -->

        <!-- header.head -->
        <header class="head">
          <div class="search-bar">
            <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
              <i class="fa fa-expand"></i>
            </a>
          </div>

          <!-- Main Bar -->
          <?php include 'includes/mainbar.php' ?>

        </header>

        <!-- end header.head -->
      </div><!-- /#top -->


      <!-- Left Menu -->
      <?php include 'includes/menu.php' ?>

      <div id="content">
        <div class="outer">
          <div class="inner">
            <!-- Pages -->
            <?php

            switch ($page) {
              case 'dashboard':
                include 'pages/dashboard.php';
                break;

                case 'new':
                include 'pages/new.php';
                break;

                case 'active':
                include 'pages/active.php';
                break;

                case 'pending':
                include 'pages/pending.php';
                break;

                case 'rejected':
                include 'pages/rejected.php';
                break;

                case 'edit':
                include 'pages/edit.php';
                break;

                case 'profile':
                include 'pages/profile.php';
                break;

                case 'password':
                include 'pages/password.php';
                break;
              
              default:
                include 'pages/dashboard.php';
                break;
            }
             
            ?>
            <!-- End Of Pages -->
          </div>

          <!-- end .inner -->
        </div>

        <!-- end .outer -->
      </div>

      <!-- end #content -->
    </div><!-- /#wrap -->
    
    <!-- Footer -->
    <?php include 'includes/footer.php' ?>


    <script src="assets/lib/jquery.min.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/lib/datatables/jquery.dataTables.js"></script>
    <script src="assets/lib/datatables/DT_bootstrap.js"></script>
    <script src="assets/lib/tablesorter/js/jquery.tablesorter.min.js"></script>
    <script src="assets/lib/touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script src="assets/lib/autosize/jquery.autosize.min.js"></script>
    <script src="assets/lib/tagsinput/jquery.tagsinput.min.js"></script>
    <script src="assets/lib/chosen/chosen.jquery.min.js"></script>
    <script src="assets/lib/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>

    <script>
      $(function() {
        metisTable();
        metisSortable();
      });
    </script>


    <script type="text/javascript">

        $("#manufacturer").change(function(){
                window.location.replace("index.php?p=new&sman="+$('#manufacturer').val());
            });

    </script>

    <script>
      $(function() {
        formGeneral();
      });
    </script>

  </body>
</html>