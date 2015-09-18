<?php
  
  session_start();


  $sqlStatment = "SELECT * FROM ads";
//echo $sqlStatment;
  
  try{
    $query = $db->query($sqlStatment);

    $query->setFetchMode(PDO::FETCH_ASSOC);

    $row = $query->fetch();

    }
    catch(PDOException $e) {
        die($e->getMessage());
    }

?>
<div class="row">
	<div class="col-lg-2">
	</div>
  <div class="col-lg-8">
    <div class="box dark">
      <header>
        <div class="icons">
          <i class="fa fa-bookmark"></i>
        </div>
        <h5>Advertising</h5>
      </header>

      <div id="div-1" class="accordion-body collapse in body">
        <form action="functions/update_ads.php" method="post" class="form-horizontal" data-parsley-validate>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">720x90</label>
            <div class="col-lg-8">
              <textarea rows="4" cols="20" name="ad720" class="form-control" data-parsley-length="[25, 2000]" required><?php echo $row['ad720']; ?></textarea>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="pass1" class="control-label col-lg-4">250x250</label>
            <div class="col-lg-8">
              <textarea rows="4" cols="20" name="ad250" class="form-control" data-parsley-length="[25, 2000]" required><?php echo $row['ad250']; ?></textarea>
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