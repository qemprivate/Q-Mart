<?php
  
  /* Get  products */
    $SqlUnTop = "SELECT * FROM products WHERE topproduct = 0";

    $SqlTop = "SELECT * FROM products WHERE topproduct = 1";

?>

<p></p>

	<form action="functions/update_top.php" method="post" class="form-horizontal" data-parsley-validate>

		<div class="form-group">
	        <label class="control-label col-lg-4">Select Top Products</label>
	        <div class="col-lg-8">
	          <select name="toppro" data-placeholder="Choose top product..." class="form-control chzn-select" tabindex="2" required>
	            <option value=""></option>
	            <?php
                foreach ($db->query($SqlUnTop) as $rowUnTop) {
                ?>
	            <option value="<?php echo $rowUnTop['id']; ?>"><?php echo $rowUnTop['ptitle']; ?></option>
	            <?php } ?>
	          </select>
	        </div>
	      </div>


          <div class="form-group">
            <div>
              <center><button class="btn btn-lg btn-success" type="submit">Select</button></center>
            </div>
          </div><!-- /.form-group -->

	</form>
      
	<div class="col-lg-12">
        <div class="box">
          <header>
            <h5>Top Products</h5>
            <div class="toolbar">
              <div class="btn-group">
                <a href="#stripedTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                  <i class="icon-chevron-up"></i>
                </a>
              </div>
            </div>
          </header>
          <div id="stripedTable" class="body collapse in">
            <table class="table table-striped responsive-table">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($db->query($SqlTop) as $rowTop) {
                ?>
                <tr>
                  <td><img src="../images/products/<?php echo $rowTop['pimage']; ?>" width="200" height="150"></td>
                  <td><a href="../product.php?p=<?php echo $rowTop['pseo']; ?>&id=<?php echo $rowTop['id']; ?>" target="_blank"><?php echo $rowTop['ptitle']; ?></a></td>
                  <td><a href="functions/remove_top.php?id=<?php echo $rowTop['id']; ?>" class="btn btn-danger btn-sm"> Remove </a></td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div><!-- /.col-lg-6 -->

</div>