<?php 

  session_start();
  if ($_SESSION['admin'] == "") {
    
    header("Location: ../login.php");
  }

  include '../include/config.php';

  // Select Categories
  $SqlCat = "SELECT * FROM cats ORDER BY cat";


?>

<div class="row">
	<div class="col-lg-2">
	</div>
  <div class="col-lg-12">
    <div class="box dark">
      <header>
        <div class="icons">
          <i class="fa fa-plus"></i>
        </div>
        <h5>Add New Product</h5>
      </header>

      <div id="div-1" class="accordion-body collapse in body">
        <form action="functions/add_product.php" method="post" class="form-horizontal" enctype="multipart/form-data" data-parsley-validate>

          <div class="form-group">
            <label for="cat" class="control-label col-lg-4">Category</label>
            <div class="col-lg-8">
              <select name="cat" id="cat" data-placeholder="Choose a Manufacturer..." class="form-control chzn-select" tabindex="2" required>
                    <option selected disabled>Select Category</option>
                <?php
                foreach ($db->query($SqlCat) as $rowCat) { 
                ?>
                    <option value="<?php echo $rowCat['id']; ?>" ><?php echo $rowCat['cat']; ?></option>
                <?php
                  } 
                ?>
              </select>
            </div>
          </div><!-- /.form-group -->


          <div class="form-group">
            <label for="ptitle" class="control-label col-lg-4">Title</label>
            <div class="col-lg-8">
              <input type="text" name="ptitle" placeholder="Enter Product Title" class="form-control">
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="saleoffer" class="control-label col-lg-4">Condition</label>
            <div class="col-lg-8">
              <select name="newused" class="form-control chzn-select" tabindex="2">
                <option value="New">New</option>
                <option value="Used">Used</option>
              </select>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="saleoffer" class="control-label col-lg-4">Sale/Offer</label>
            <div class="col-lg-8">
              <select name="saleoffer" class="form-control chzn-select" tabindex="2">
                <option value="none">None</option>
                <option value="sale">Sale</option>
                <option value="offer">Offer</option>
              </select>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="oprice" class="control-label col-lg-4">Old Price</label>
            <div class="col-lg-8">
              <input type="text" name="oprice" placeholder="150" class="form-control" data-parsley-type="number">
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="nprice" class="control-label col-lg-4">New Price</label>
            <div class="col-lg-8">
              <input type="text" name="nprice" placeholder="125" class="form-control" data-parsley-type="number">
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="nprice" class="control-label col-lg-4">Availability</label>
            <div class="col-lg-8">
              <input type="text" name="availability" placeholder="35" class="form-control" data-parsley-type="digits">
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="shortdescription" class="control-label col-lg-4">Short Description</label>
            <div class="col-lg-8">
              <input name="shortdescription" placeholder="Enter Short Description" class="form-control">
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="description" class="control-label col-lg-4">Description</label>
            <div class="col-lg-8">
              <textarea name="description"></textarea>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="pimage" class="control-label col-lg-4">Product Image</label>
            <div class="col-lg-8">
              <input type="file" name="pimage" id="pimage" class="form-control" required>
            </div>
          </div><!-- /.form-group -->


          <div class="form-group">
            <div>
              <center><button class="btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i> Save</button></center>
            </div>
          </div><!-- /.form-group -->
          
        </form>
      </div>
    </div>
  </div>

	<div class="col-lg-2">
	</div>

  <!--END SELECT-->
</div><!-- /.row -->