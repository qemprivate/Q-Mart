<?php
  
  session_start();

  /* Get  cars */
  if ($_SESSION['role'] == 0) {
    $SqlProducts = "SELECT * FROM products WHERE pstatus = 2";
  }else{
    $SqlProducts = "SELECT * FROM products WHERE pstatus = 2 AND sellerid = " . $_SESSION['admin'];
  }

?>

<div class="row">
  <div class="col-lg-12">
    <div class="box dark">
      <header>
        <div class="icons">
          <i class="fa fa-check"></i>
        </div>
        <h5>Rejected Products</h5>
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
              if ($_SESSION['role'] == 0) {
              ?>
              <a href="functions/approve.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"> Approve </a>
              <a href="functions/delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"> Delete </a>
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