<?php
  
  /* Get  slider images */
    $SqlSlider = "SELECT * FROM sliderimages";

?>

<p></p>

	<form action="functions/update_slider.php" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate>

		<div class="form-group">
	        <div class="form-group">
            <label for="simage" class="control-label col-lg-4">Upload Slider Image</label>
            <div class="col-lg-8">
              <input type="file" name="simage" id="simage" class="form-control" required>
            </div>
          </div><!-- /.form-group -->


          <div class="form-group">
            <div>
              <center><button class="btn btn-lg btn-success" type="submit">Upload</button></center>
            </div>
          </div><!-- /.form-group -->

	</form>
      
	<div class="col-lg-12">
        <div class="box">
          <header>
            <h5>Slider Images</h5>
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
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($db->query($SqlSlider) as $rowSlider) {
                ?>
                <tr>
                  <td><img src="../images/slider/<?php echo $rowSlider['simage']; ?>" width="300" height="150"></td>
                  <td><a href="functions/remove_slider.php?id=<?php echo $rowSlider['id']; ?>" class="btn btn-danger btn-sm"> Remove </a></td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div><!-- /.col-lg-6 -->

</div>