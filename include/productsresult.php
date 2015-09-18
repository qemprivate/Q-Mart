<?php

  // Get Order By
  if( isset($_GET{'order'} ) ){

    if ($_REQUEST['order'] == "new") {
      $orderby = "id";
      $ordr = "new";
      $desc = "DESC";
    }

    if ($_REQUEST['order'] == "az") {
      $orderby = "ptitle";
      $ordr = "az";
      $desc = "ASC";
    }

    if ($_REQUEST['order'] == "za") {
      $orderby = "ptitle";
      $ordr = "za";
      $desc = "DESC";
    }

    if ($_REQUEST['order'] == "lth") {
      $orderby = "nprice";
      $ordr = "lth";
      $desc = "ASC";
    }

    if ($_REQUEST['order'] == "htl") {
      $orderby = "nprice";
      $ordr = "htl";
      $desc = "DESC";
    }

  }
  else{
    $orderby = "id";
    $ordr = "new";
    $desc = "DESC";
  }

  $desc = "DESC";

  if( isset($_GET{'setsort'} ) ){

    if ($_REQUEST['setsort'] == "new") {
      $orderby = "id";
      $ordr = "new";
      $desc = "DESC";
    }

    if ($_REQUEST['setsort'] == "az") {
      $orderby = "ptitle";
      $ordr = "az";
      $desc = "ASC";
    }

    if ($_REQUEST['setsort'] == "za") {
      $orderby = "ptitle";
      $ordr = "za";
      $desc = "DESC";
    }

    if ($_REQUEST['setsort'] == "lth") {
      $orderby = "nprice";
      $ordr = "lth";
      $desc = "ASC";
    }

    if ($_REQUEST['setsort'] == "htl") {
      $orderby = "nprice";
      $ordr = "htl";
      $desc = "DESC";
    }

  }



  
      if ($_GET{'p'} == "search") {
        $sqlAllProducts = "SELECT * FROM products WHERE ptitle LIKE '%" . $_REQUEST['skeyword'] . "%' AND pstatus = 1" ;
      }

    
    else{
        $sqlAllProducts = "SELECT * FROM products WHERE pstatus = 1";
    }



// Pagination
  $rec_limit = 9;
  $page = 1;
  $offset = 0;
  try{
      $queryCount = $db->query($sqlAllProducts);

      $rec_count = $queryCount->rowCount();

      if( isset($_GET{'page'} ) )
      {
         $page = $_GET{'page'};
         $offset = $rec_limit * ($page-1) ;
      }
      else
      {
         $page = 1;
         $offset = 0;
      } // end if

      $left_rec = $rec_count - ($page * $rec_limit);
      $pagesNum = ceil($rec_count / 9);

  }
  catch(PDOException $e) {
      die($e->getMessage());
  } // Pagination End


   

      if ($_GET{'p'} == "search") {
        $sqlProducts = "SELECT * 
        FROM products 
        WHERE ptitle LIKE '%" 
        . $_REQUEST['skeyword'] 
        . "%' AND pstatus = 1 ORDER BY " 
        . $orderby . " " 
        . $desc . " LIMIT " 
        . $offset . ", " 
        . $rec_limit;
      }
 
  
    else{
        $sqlProducts = "SELECT * FROM products WHERE pstatus = 1 ORDER BY " . $orderby . " " . $desc . " LIMIT " . $offset . ", " . $rec_limit;
    }


?>

<h1 class="productname"><?php echo $CatTitle; ?></h1>

<div class="container">
	<div class="result-holder" style="display: block;width: 80%;margin: 0 auto;min-height: 400px;">
		<?php foreach ($db->query($sqlProducts) as $rowProducts2) { ?>
		<div class="result-product">
			<a href="product.php?p=<?php echo $rowProducts2['pseo']; ?>&id=<?php echo $rowProducts2['id']; ?>" class="span3"><img style="width:190px; height:195px;float: left;" src="images/products/<?php echo $rowProducts2['pimage'] ?>" alt=""></a>
			<h1><a href="product.php?p=<?php echo $rowProducts2['pseo']; ?>&id=<?php echo $rowProducts2['id']; ?>" class="prdocutname"><?php echo $rowProducts2['ptitle']; ?></a></h1>
			<div class=""> 
				<p><?php echo $rowProducts2['shortdesc']; ?></p>
			</div>
			<div class="">
				<div class="">  
				  <span class="oldprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowProducts2['oldprice'],2); ?></span>
				  <span class="newprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowProducts2['nprice'],2); ?></span>
				</div>
				  <a class="" href="product.php?p=<?php echo $rowProducts2['pseo']; ?>&id=<?php echo $rowProducts2['id']; ?>"><?php echo $rowLang['lang14'];?></a>
			</div>
		</div>
	  <?php } ?>
	</div>
</div>

<div class="">
	<ul>
    <?php
	  $pgx = "";
		if ($_GET{'p'} == "search") { 
		  $pgx = "p=search&order=" . $ordr . "&";
		 } else {
		  $pgx = "order=" . $ordr . "&";
	  }
    ?>
		<li><a href="results.php?<?php echo $pgx; ?>page=<?php echo $page<2 ? 1 : $page-1; ?>"><?php echo $rowLang['lang45'];?></a></li>
	<?php
            for ($i=0; $i < $pagesNum; $i++) { ?>
        <li class="<?php echo $page==$i+1 ? 'active' : ''; ?>"><a href="results.php?<?php echo $pgx; ?>page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></li>
    <?php } ?>
		<li><a href="results.php?<?php echo $pgx; ?>page=<?php echo $page==$pagesNum ? $page : $page+1; ?>"><?php echo $rowLang['lang44'];?></a></li>
	</ul>
</div>