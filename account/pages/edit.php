<?php 

  session_start();
  if ($_SESSION['admin'] == "") {
    
    header("Location: ../adminlogin.php");
  }


//Select Product Data
    $sqlStatment = "SELECT * FROM products WHERE id = " . $productid;
        
    try{
        $query = $db->query($sqlStatment);

        $query->setFetchMode(PDO::FETCH_ASSOC);

        $row = $query->fetch();

        if ($query->rowCount() < 1) {

            header("Location: 404.php");
        }

        }
        catch(PDOException $e) {
            die($e->getMessage());
        }

//Select Product Specifications
    $sqlSpecifications = "SELECT * FROM specifications WHERE pid = " . $productid;
        

//Select Product Images
    $sqlImages = "SELECT * FROM productimages WHERE pid = " . $productid;


// Select categories
    $SqlCat = "SELECT * FROM cats";
        


?>

<div class="row">
  <div class="col-lg-12">
    <div class="box dark">
      <header>
        <div class="icons">
          <i class="fa fa-car"></i>
        </div>
        <h5><?php echo $row['ptitle']; ?></h5>
      </header>

      <div id="collapse4" class="body">

        <ul class="nav nav-tabs">
		  <li role="presentation" class="active"><a href="#details" data-toggle="tab">Details</a></li>
		  <li role="presentation"><a href="#options" data-toggle="tab">Specifications</a></li>
		  <li role="presentation"><a href="#pimages" data-toggle="tab">Images</a></li>
		</ul>

		<div id="myTabContent" class="tab-content">

                    <div class="tab-pane fade in active" id="details">
                    	<p></p>
                    	<center>
                    	<form action="functions/update_product.php?pid=<?php echo $productid; ?>" method="post" class="form-horizontal" data-parsley-validate>

				          <div class="form-group">
				            <label for="cat" class="control-label col-lg-4">Category</label>
				            <div class="col-lg-8">
				              <select name="cat" id="cat" data-placeholder="Choose a Manufacturer..." class="form-control chzn-select" tabindex="2" required>
				                    <option selected disabled>Select Category</option>
				                <?php
				                foreach ($db->query($SqlCat) as $rowCat) { 
				                ?>
				                    <option value="<?php echo $rowCat['id']; ?>" <?php echo $row['catid']==$rowCat['id'] ? "selected" : ""; ?>><?php echo $rowCat['cat']; ?></option>
				                <?php
				                  } 
				                ?>
				              </select>
				            </div>
				          </div><!-- /.form-group -->


				          <div class="form-group">
				            <label for="ptitle" class="control-label col-lg-4">Title</label>
				            <div class="col-lg-8">
				              <input value="<?php echo $row['ptitle']; ?>" type="text" name="ptitle" placeholder="Enter Car Title" class="form-control" data-parsley-length="[5, 150]" required>
				            </div>
				          </div><!-- /.form-group -->

				          <div class="form-group">
				            <label for="saleoffer" class="control-label col-lg-4">Sale/Offer</label>
				            <div class="col-lg-8">
				              <select name="saleoffer" class="form-control chzn-select" tabindex="2" required>
				                <option value="none">None</option>
				                <option value="sale" <?php echo $row['saleoffer']=="sale" ? "selected" : ""; ?>>Sale</option>
				                <option value="offer" <?php echo $row['saleoffer']=="offer" ? "selected" : ""; ?>>Offer</option>
				              </select>
				            </div>
				          </div><!-- /.form-group -->

				          <div class="form-group">
				            <label for="oprice" class="control-label col-lg-4">Old Price</label>
				            <div class="col-lg-8">
				              <input value="<?php echo $row['oldprice']; ?>" type="text" name="oprice" placeholder="150" class="form-control" data-parsley-type="number" required>
				            </div>
				          </div><!-- /.form-group -->

				          <div class="form-group">
				            <label for="nprice" class="control-label col-lg-4">New Price</label>
				            <div class="col-lg-8">
				              <input value="<?php echo $row['nprice']; ?>" type="text" name="nprice" placeholder="125" class="form-control" data-parsley-type="number" required>
				            </div>
				          </div><!-- /.form-group -->

				          <div class="form-group">
				            <label for="availability" class="control-label col-lg-4">Availability</label>
				            <div class="col-lg-8">
				              <input value="<?php echo $row['availability']; ?>" type="text" name="availability" placeholder="35" class="form-control" data-parsley-type="digits" required>
				            </div>
				          </div><!-- /.form-group -->

				          <div class="form-group">
				            <label for="shortdescription" class="control-label col-lg-4">Short Description</label>
				            <div class="col-lg-8">
				              <input value="<?php echo $row['shortdesc']; ?>" name="shortdescription" placeholder="Enter Short Description" class="form-control" data-parsley-length="[100, 200]" required>
				            </div>
				          </div><!-- /.form-group -->

				          <div class="form-group">
				            <label for="description" class="control-label col-lg-4">Description</label>
				            <div class="col-lg-8">
				              <textarea name="description"><?php echo $row['pdescription']; ?></textarea>
				            </div>
				          </div><!-- /.form-group -->


				          <div class="form-group">
				            <div>
				              <center><button class="btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i> Save</button></center>
				            </div>
				          </div><!-- /.form-group -->
				          
				        </form>
				        </center>
                    </div>

                    <div class="tab-pane fade" id="options">
                    	<p></p>

						<form action="functions/add_specification.php?pid=<?php echo $productid; ?>" method="post" class="form-horizontal" data-parsley-validate>

					    <div class="form-group">
					        <label for="specification" class="control-label col-lg-4">Specification </label>
					        <div class="col-lg-8">
					          <input type="text" name="specification" class="form-control" required>
					        </div>
					      </div><!-- /.form-group -->

					    <div class="form-group">
					        <label for="svalue" class="control-label col-lg-4">Value </label>
					        <div class="col-lg-8">
					          <input type="text" name="svalue" class="form-control" required>
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
					            <h5>Specifications</h5>
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
					                  <th>Specification</th>
					                  <th>Value</th>
					                  <th>Action</th>
					                </tr>
					              </thead>
					              <tbody>

					                <?php
					                foreach ($db->query($sqlSpecifications) as $row) {
					                ?>
					                <tr>
					                  <td><?php echo $row['speci']; ?></td>
					                  <td><?php echo $row['pvalue']; ?></td>
					                  <td>
					                  <a href="functions/remove_specification.php?id=<?php echo $row['id']; ?>&pid=<?php echo $productid ?>" class="btn btn-danger btn-sm"> Delete </a>
					                  </td>
					                </tr>
					                <?php } ?>

					              </tbody>
					            </table>
					          </div>
					        </div>
					      </div><!-- /.col-lg-6 -->

                    </div>

                    <div class="tab-pane fade" id="pimages">

                    <p></p>

                    	<form action="functions/upload_image.php?pid=<?php echo $productid; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" data-parsley-validate>

                    		<div class="form-group">
					            <label for="cimage" class="control-label col-lg-4">Upload Image</label>
					            <div class="col-lg-8">
					              <input type="file" name="pimage" id="pimage" multiple="true"/>
					            </div>
					          </div><!-- /.form-group -->


					          <div class="form-group">
					            <div>
					              <center><button class="btn btn-lg btn-success" type="submit"><i class="fa fa-upload"></i> Upload</button></center>
					            </div>
					          </div><!-- /.form-group -->

                    	</form>
                          
                    	<div class="col-lg-12">
			                <div class="box">
			                  <header>
			                    <h5>Product Images</h5>
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
			                        foreach ($db->query($sqlImages) as $rowImage) {
			                        ?>
			                        <tr>
			                          <td><img src="../images/products/<?php echo $rowImage['pimage']; ?>" width="200" height="150"></td>
			                          <td><a href="functions/delete_image.php?id=<?php echo $rowImage['id']; ?>&pid=<?php echo $productid; ?>" class="btn btn-danger btn-sm"> Delete </a></td>
			                        </tr>
			                        <?php } ?>

			                      </tbody>
			                    </table>
			                  </div>
			                </div>
			              </div><!-- /.col-lg-6 -->

                    </div>

        </div>

      </div>
        
      </div>
    </div>
  </div>

  <!--END SELECT-->
</div><!-- /.row -->