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
<html lang="<?php echo $rowLang['langchar'];?>" dir="<?php echo $rowLang['dircetionx'];?>">

<head>
<meta charset="utf-8">
<title><?php echo $CatTitle; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">


<!-- styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<!-- Slider -->
<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />


<!-- fav and touch icons -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Inline CSS 
================================================== -->

</head>
<body>


        <?php include 'include/productsresult.php'; ?>
      
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>

<script defer src="js/custom.js"></script>


<script type="text/javascript">

  $("#sortby").change(function(){
          window.location.replace("results2.php?<?php echo $pgx; ?>page=<?php echo $page<2 ? 1 : $page-1; ?>&setsort="+$('#sortby').val());
      });

</script>

</body>
</html>