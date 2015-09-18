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

  }else{
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



  if( isset($_GET{'id'} ) ){
        $sqlAllProducts = "SELECT * FROM products WHERE pstatus = 1 AND catid = " . $_REQUEST['id'];
      }
    elseif (isset($_GET{'p'} )) {

      if ($_GET{'p'} == "offers") {
        $sqlAllProducts = "SELECT * FROM products WHERE saleoffer = 'offer' AND pstatus = 1" ;
      }

      if ($_GET{'p'} == "sale") {
        $sqlAllProducts = "SELECT * FROM products WHERE saleoffer = 'sale' AND pstatus = 1" ;
      }

      if ($_GET{'p'} == "search") {
        $sqlAllProducts = "SELECT * FROM products WHERE ptitle LIKE '%" . $_REQUEST['skeyword'] . "%' AND pstatus = 1" ;
      }

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


    if( isset($_GET{'id'} ) )
      {
        $sqlProducts = "SELECT * FROM products WHERE catid = " . $_REQUEST['id'] . " AND pstatus = 1 ORDER BY " . $orderby . " " . $desc . " LIMIT " . $offset . ", " . $rec_limit;
      }
    elseif (isset($_GET{'p'} )) {

      if ($_GET{'p'} == "offers") {
        $sqlProducts = "SELECT * FROM products WHERE saleoffer = 'offer' AND pstatus = 1 ORDER BY " . $orderby . " " . $desc . " LIMIT " . $offset . ", " . $rec_limit;
      }

      if ($_GET{'p'} == "sale") {
        $sqlProducts = "SELECT * FROM products WHERE saleoffer = 'sale' AND pstatus = 1 ORDER BY " . $orderby . " " . $desc . " LIMIT " . $offset . ", " . $rec_limit;
      }

      if ($_GET{'p'} == "search") {
        $sqlProducts = "SELECT * FROM products WHERE ptitle LIKE '%" . $_REQUEST['skeyword'] . "%' AND pstatus = 1 ORDER BY " . $orderby . " " . $desc . " LIMIT " . $offset . ", " . $rec_limit;
      }

    }
    else{
        $sqlProducts = "SELECT * FROM products WHERE pstatus = 1 ORDER BY " . $orderby . " " . $desc . " LIMIT " . $offset . ", " . $rec_limit;
    }


?>
<h1 class="productname"><?php echo $CatTitle; ?></h1>
<section id="latest">
  <div class="row">
    <div class="span9">
      <div class="sorting well">
        <form class=" form-inline pull-left">
          <?php echo $rowLang['lang16'];?> :
          <select class="span2" id="sortby">
            <option selected disabled><?php echo $rowLang['lang37'];?></option>
            <option value="new"><?php echo $rowLang['lang38'];?></option>
            <option value="az"><?php echo $rowLang['lang39'];?></option>
            <option value="za"><?php echo $rowLang['lang40'];?></option>
            <option value="htl"><?php echo $rowLang['lang41'];?></option>
            <option value="lth"><?php echo $rowLang['lang42'];?></option>
          </select>
        </form>
        <div class="btn-group pull-right">
          <button id="list" class="btn"><i class="icon-th-list"></i>
          </button>
          <button id="grid" class="btn btn-success"><i class="icon-th icon-white"></i></button>
        </div>
      </div>
      <section id="thumbnails">
        <ul class="thumbnails grid" style="display: block;">
          
          <?php
            foreach ($db->query($sqlProducts) as $rowProducts) {
          ?>
            <li class="span3">  
              <a class="prdocutname" href="product.php?p=<?php echo $rowProducts['pseo']; ?>&id=<?php echo $rowProducts['id']; ?>"><?php echo substr($rowProducts['ptitle'],0,25) . "..." ?></a>
              <div class="thumbnail"> 
                <span class="<?php echo $rowProducts['saleoffer']; ?> tooltip-test" data-original-title=""></span>
                <a href="product.php?p=<?php echo $rowProducts['pseo']; ?>&id=<?php echo $rowProducts['id']; ?>"><span><span><img style="width:250px; height:200px;" alt="" src="images/products/<?php echo $rowProducts['pimage'] ?>" ></span></span> </a>
                <div class="caption">
                  <div class="price pull-left"> 
                    <span class="oldprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowProducts['oldprice'],2); ?></span>
                    <span class="newprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowProducts['nprice'],2); ?></span>
                  </div>  
                  <a class="btn pull-right" href="product.php?p=<?php echo $rowProducts['pseo']; ?>&id=<?php echo $rowProducts['id']; ?>"><?php echo $rowLang['lang14'];?></a>
                  <div class="clearfix"></div>

                </div>
              </div>
            </li>
            <?php } ?>

        </ul>

        <ul class="thumbnails list" style="display: none;">
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

              if (isset($_GET{'id'} )) {
                
                $pgx = "id=" . $_REQUEST['id'] . "&order=" . $ordr . "&";

              }elseif (isset($_GET{'p'} )) {
                if ($_GET{'p'} == "offers") { 
                  $pgx = "p=offers&order=" . $ordr . "&";
                }

              }else{
                  $pgx = "order=" . $ordr . "&";
              }
             ?>

            <li><a href="category.php?<?php echo $pgx; ?>page=<?php echo $page<2 ? 1 : $page-1; ?>"><?php echo $rowLang['lang45'];?></a>
            </li>

          <?php
            for ($i=0; $i < $pagesNum; $i++) { ?>
            <li class="<?php echo $page==$i+1 ? 'active' : ''; ?>">
              <a href="category.php?<?php echo $pgx; ?>page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a>
            </li>
          <?php } ?>

            <li><a href="category.php?<?php echo $pgx; ?>page=<?php echo $page==$pagesNum ? $page : $page+1; ?>"><?php echo $rowLang['lang44'];?></a>
            </li>

          </ul>
        </div>

      </section>
    </div>
  </div>
</section>


