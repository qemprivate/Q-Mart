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

  // Select Product
  $sqlProduct = "SELECT * FROM products WHERE id=" . $_REQUEST['id'];
  
  try{
    $queryProduct = $db->query($sqlProduct);

    $queryProduct->setFetchMode(PDO::FETCH_ASSOC);

    $rowProduct = $queryProduct->fetch();

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
<title><?php echo $rowProduct['ptitle']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- styles -->
<link rel="stylesheet" href="css/homepage.css?v1.0" type="text/css">
<style type="text/css">
		

		.tab-content .tab-pane{
			
			display: none
		}
		.tab-content .active{
			display: block
		}
		
	</style>
<!-- fav and touch icons -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Inline CSS 
================================================== -->
</head>
<body>
 <div class="empty-holder">
<?php include 'include/topsearchbar.php'; ?>
</div>

<!--Content starts-->
<div id="maincontainer">

	<div class="container">
		

      <div class="empty-holder">
        
        <?php include 'include/productdetails.php'; ?>
      
      </div>

     

      <div class="empty-holder">
      
        <?php include 'include/relatedproducts.php'; ?>
      
      </div>


</div>
</div>
<!-- Footer Starts-->
<footer id="footer">
</footer>


<!-- /maincontainer -->

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/app.js?v1.0"></script>
<script type="text/javascript">
  var bars=document.querySelectorAll('.sticky-wrapper')
  Array.prototype.forEach.call(bars, function(bar) {
    sticky(bar);
  });
  
  var container=document.querySelector('.information-container')
	tabs(container);
  </script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
$('.menu_stripe').on('click', function() {
    $(this).toggleClass('open');
});

</script>

</body>
</html>