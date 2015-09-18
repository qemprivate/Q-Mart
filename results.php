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
    
  // Select category

  $CatTitle;

  if( isset($_GET{'id'} ) ){
    $sqlCat = "SELECT * FROM cats WHERE id=" . $_REQUEST['id'];
    try{
      $queryCat = $db->query($sqlCat);

      $queryCat->setFetchMode(PDO::FETCH_ASSOC);

      $rowCatx = $queryCat->fetch();

      $CatTitle = $rowCatx['cat'];

      }
      catch(PDOException $e) {
          die($e->getMessage());
      }
  }
  else{
    $CatTitle = $rowLang['lang15'];    
  }


?>
<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html lang="en_US" class="no-js iem7"> <![endif]-->
<!--[if lt IE 7]> <html class="ie6 lt-ie10 lt-ie9 lt-ie8 lt-ie7 no-js" lang="en_US"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 lt-ie10 lt-ie9 lt-ie8 no-js" lang="en_US"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 lt-ie10 lt-ie9 no-js" lang="en_US"> <![endif]-->
<!--[if IE 9]>    <html class="ie9 lt-ie10 no-js" lang="en_US"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en_US"><!--<![endif]-->

<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1" />
<meta name="HandheldFriendly" content="true"/>

<link rel="stylesheet" href="css/homepage.css?v2.4" type="text/css">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" sizes="16x16 24x24 32x32 64x64"/>
<link rel="apple-touch-icon" href=""/>
<link rel="apple-touch-icon" sizes="76x76" href=""/>
<link rel="apple-touch-icon" sizes="120x120" href=""/>
<link rel="apple-touch-icon" sizes="152x152" href=""/>
<link rel="image_src" href=""/>


<meta name="twitter:site" value="@qwikemart">
<meta name="twitter:url" value="https://qwikemart.com/results">

<meta property="og:url" content="https://qwikemart.com/results" />
<meta property="og:site_name" content="Qwik-E-Mart" />


	<title>Qwik-E-Mart</title>
	
<meta property="og:title" content="Qwik-E-Mart Results" />
<meta name="twitter:title" value="Qwik-E-Mart Results">

</head>
  
<body>
<div class="container">
  
<?php include 'include/topsearchbar.php'; ?>

<!-- Home Page Product Featured Starts -->
	<?php include 'include/resultspage-topproduct.php'; ?>
<!-- Home Page Product Featured Ends -->

<?php include 'include/productsresult.php'; ?>

		
	
</div> 
<!-- site-wrapper -->
<script>
$('.menu_stripe').on('click', function() {
    $(this).toggleClass('open');
});

</script>
</body>
</html>
