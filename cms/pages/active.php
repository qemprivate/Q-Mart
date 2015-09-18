<?php
  
  session_start();

  /* Get  */
  if ($_SESSION['role'] == 0) {
    $SqlProducts = "SELECT * FROM products WHERE pstatus = 1";
  }else{
    $SqlProducts = "SELECT * FROM products WHERE pstatus = 1 AND sellerid = " . $_SESSION['admin'];
  }
    

?>

<div class="row">
  <div class="col-lg-12">
    <div class="box dark">
      <header>
        <div class="icons">
          <i class="fa fa-check"></i>
        </div>
        <h5>Active Products</h5>
      </header>

      <div id="collapse4" class="body">

        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">

          <thead>
            <tr>
              <th>...</th>
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
            	<td><img style="width:48px; height:48px;" src="http://qwikemart.com/images/products/<?php echo $row['pimage'] ?>" alt=""></td>
              <td><a href="../product.php?p=<?php echo $row['pseo']; ?>&id=<?php echo $row['id']; ?>" target="_blank"> <?php echo $row['ptitle']; ?></a></td>
              <td><?php echo $row['cattxt']; ?></td>
              <td><?php echo $row['oldprice']; ?></td>
              <td><?php echo $row['nprice']; ?></td>
              <td><center>
              <a href="../product.php?p=<?php echo $row['pseo']; ?>&id=<?php echo $row['id']; ?>" class="btn btn-default btn-sm" target="_blank"> Preview </a>
              <?php
              if ($_SESSION['role'] == 0) {
              ?>
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