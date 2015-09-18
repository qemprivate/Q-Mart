<?php
  
  session_start();


  $sqlStatment = "SELECT * FROM users WHERE user_id=" . $_SESSION['admin'];
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
          <i class="fa fa-gears"></i>
        </div>
        <h5>Edit Password</h5>
      </header>

      <div id="div-1" class="accordion-body collapse in body">
        <form action="functions/update_password.php" method="post" class="form-horizontal" data-parsley-validate>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Email</label>
            <div class="col-lg-8">
              <input type="text" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $row['email']; ?>" data-parsley-type="email" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="pass1" class="control-label col-lg-4">Password</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" id="password" name="password" data-original-title="Please use your secure password" data-placement="top" value="<?php echo $row['password']; ?>" data-parsley-length="[5, 25]" required/>
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