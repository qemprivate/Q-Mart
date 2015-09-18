<?php
/*
  error_reporting(E_ALL);
ini_set('display_errors', 1);
 */ 
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
 
      <section id="thumbnails">
        <ul class="thumbnails grid" style="display: none;">
          
          <?php
            foreach ($db->query($sqlProducts) as $rowProducts) {
          ?>
            <li class="span3">  
              <a class="prdocutname" href="product.php?q=<?php echo $rowProducts['pseo']; ?>&id=<?php echo $rowProducts['id']; ?>"><?php echo substr($rowProducts['ptitle'],0,25) . "..." ?></a>
              <div class="thumbnail"> 
                <span class="<?php echo $rowProducts['saleoffer']; ?> tooltip-test" data-original-title=""></span>
                <a href="product.php?q=<?php echo $rowProducts['pseo']; ?>&id=<?php echo $rowProducts['id']; ?>"><span><span><img style="width:250px; height:200px;" alt="" src="images/products/<?php echo $rowProducts['pimage'] ?>" ></span></span> </a>
                <div class="caption">
                  <div class="price pull-left"> 
                    <span class="oldprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowProducts['oldprice'],2); ?></span>
                    <span class="newprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowProducts['nprice'],2); ?></span>
                  </div>  
                  <a class="btn pull-right" href="product.php?q=<?php echo $rowProducts['pseo']; ?>&id=<?php echo $rowProducts['id']; ?>"><?php echo $rowLang['lang14'];?></a>
                  <div class="clearfix"></div>

                </div>
              </div>
            </li>
            <?php } ?>

        </ul>

        <ul class="thumbnails list" style="display: block;">
        <?php
          foreach ($db->query($sqlProducts) as $rowProducts2) {
        ?>
          <li class="span9">
            <a href="product.php?p=<?php echo $rowProducts2['pseo']; ?>&id=<?php echo $rowProducts2['id']; ?>" class="prdocutname"><?php echo $rowProducts2['ptitle']; ?></a>
            <div class="thumbnail">
              <div class="row">
                <a href="product.php?p=<?php echo $rowProducts2['pseo']; ?>&id=<?php echo $rowProducts2['id']; ?>" class="span3"><span><span><img style="width:250px; height:200px;" src="images/products/<?php echo $rowProducts2['pimage'] ?>" alt=""></span></span></a>
                <div class="details span3">  <?php echo $rowProducts2['shortdesc']; ?><br>
                </div>
                <div class="caption pull-right margin-none">
                  <table class="table table-striped table-bordered table-condensed">
                  <tbody>
                    <tr>
                      <td>
                      <div class="price pull-right">  
                      <span class="oldprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowProducts2['oldprice'],2); ?></span>
                      <span class="newprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowProducts2['nprice'],2); ?></span>
                    </div>
                    </td>
                    </tr>
                    <tr>
                      <td><a class="btn pull-right" href="product.php?p=<?php echo $rowProducts2['pseo']; ?>&id=<?php echo $rowProducts2['id']; ?>"><?php echo $rowLang['lang14'];?></a>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </li>
          <?php } ?>

        </ul>


        <div class="pagination pull-right">
          <ul>
          <?php
              $pgx = "";

            

                if ($_GET{'p'} == "search") { 
                  $pgx = "p=search&order=" . $ordr . "&";
                 }

              
              else{
                  $pgx = "order=" . $ordr . "&";
              }
             ?>

            <li><a href="results.php?<?php echo $pgx; ?>page=<?php echo $page<2 ? 1 : $page-1; ?>"><?php echo $rowLang['lang45'];?></a>
            </li>

          <?php
            for ($i=0; $i < $pagesNum; $i++) { ?>
            <li class="<?php echo $page==$i+1 ? 'active' : ''; ?>">
              <a href="results.php?<?php echo $pgx; ?>page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a>
            </li>
          <?php } ?>

            <li><a href="results.php?<?php echo $pgx; ?>page=<?php echo $page==$pagesNum ? $page : $page+1; ?>"><?php echo $rowLang['lang44'];?></a>
            </li>

          </ul>
        </div>

      </section>



