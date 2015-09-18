<?php
  
  /* Get  products */
  if ($_SESSION['role'] == 1) {
    $SqlProducts = "SELECT * FROM products WHERE pstatus = 0";
    $SqlAllProducts = "SELECT * FROM products";
  }else{
    $SqlProducts = "SELECT * FROM products WHERE pstatus = 0 WHERE sellerid = " . $_SESSION['admin'];
    $SqlAllProducts = "SELECT * FROM products WHERE sellerid = " . $_SESSION['admin'];
  }
   

    $pendingCars = 0;
    $activeCars = 0;
    $rejectedCars = 0;

    foreach ($db->query($SqlAllProducts) as $rowx) {

      switch ($rowx['pstatus']) {
                    case '0':
                      $pendingCars++;
                      break;
                    case '1':
                      $activeCars++;
                      break;
                    case '2':
                      $rejectedCars++;
                      break;
                    
                    default:
                      echo "Unknown";
                      break;
                  }
    }

?>

<div class="row">
  <ul class="stats_box">

    <li>
      <div class="stat_text">
        <strong>Active ( <?php echo $activeCars; ?> ) </strong>
      </div>
    </li>
    <li>
      <div class="stat_text">
        <strong>Pending ( <?php echo $pendingCars; ?> ) </strong>
      </div>
    </li>
    <li>
      <div class="stat_text">
        <strong>Rejected ( <?php echo $rejectedCars; ?> ) </strong>
      </div>
    </li>

  </ul>
</div>


<div class="row">
  <div class="col-lg-12">
    <div class="box dark">
      <header>
        <div class="icons">
          <i class="fa fa-check"></i>
        </div>
        <h5>Pending Products</h5>
      </header>

      <div id="collapse4" class="body">

        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">

          <thead>
            <tr>
              <th>Product</th>
              <th>Category</th>
              <th>Old Price</th>
              <th>New Price</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
          <?php
              foreach ($db->query($SqlProducts) as $row) { 
          ?>
            <tr>
              <td><a href="../product.php?p=<?php echo $row['pseo']; ?>&id=<?php echo $row['id']; ?>" target="_blank"> <?php echo $row['ptitle']; ?></a></td>
              <td><?php echo $row['cattxt']; ?></td>
              <td><?php echo $row['oldprice']; ?></td>
              <td><?php echo $row['nprice']; ?></td>
              <td><center>
              <a href="../product.php?p=<?php echo $row['pseo']; ?>&id=<?php echo $row['id']; ?>" class="btn btn-default btn-sm" target="_blank"> Preview </a>
              <a href="index.php?p=edit&pid=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"> Edit </a>
              <?php
              if ($_SESSION['role'] == 1) {
              ?>
              <a href="functions/approve.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"> Approve </a>
              <a href="functions/reject_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"> Reject </a>
              <?php } ?>
              </center></td>
            </tr>
          <?php
            } 
          ?>
          </tbody>

        </table>

      </div>
        
      </div>
    </div>
  </div>

  <!--END SELECT-->
</div><!-- /.row -->