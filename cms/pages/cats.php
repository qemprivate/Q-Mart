<?php
  
  /* Get  manufacturers */
    $Sqlcats = "SELECT * FROM cats";

?>

<p></p>

	<form action="functions/add_cat.php" method="post" class="form-horizontal" data-parsley-validate>

    <div class="form-group">
        <label for="text1" class="control-label col-lg-4">Add Category </label>
        <div class="col-lg-8">
          <input type="text" name="cat" class="form-control" required>
        </div>
      </div><!-- /.form-group -->


      <div class="form-group">
        <div>
          <center><button class="btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i> Save</button></center>
        </div>
      </div><!-- /.form-group -->

	</form>
      
	<div class="col-lg-12">
        <div class="box">
          <header>
            <h5>Categories</h5>
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
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($db->query($Sqlcats) as $row) {
                ?>
                <tr>
                  <td><?php echo $row['cat']; ?></td>
                  <td>
                  <a href="functions/remove_cat.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"> Delete </a>
                  </td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div><!-- /.col-lg-6 -->

</div>