<?php
  
  session_start();

  $sqlStatment = "SELECT * FROM users WHERE user_id=" . $uid;
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
          <i class="fa fa-user"></i>
        </div>
        <h5>My Profile</h5>
      </header>

      <div id="div-1" class="accordion-body collapse in body">
        <form action="functions/update_user.php?id=<?php echo $row['id']; ?>" method="post" class="form-horizontal" data-parsley-validate>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">First Name</label>
            <div class="col-lg-8">
              <input type="text" id="firstname" name="firstname" placeholder="Enter Your First Name" class="form-control" value="<?php echo $row['firstname']; ?>">
            </div>
          </div><!-- /.form-group -->

			<div class="form-group">
            <label for="text1" class="control-label col-lg-4">List Name</label>
            <div class="col-lg-8">
              <input type="text" id="lastname" name="lastname" placeholder="Enter Your Last Name" class="form-control" value="<?php echo $row['lastname']; ?>">
            </div>
          </div><!-- /.form-group -->
          
          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Username</label>
            <div class="col-lg-8">
              <input type="text" id="username" name="username" placeholder="Enter Your User Name" class="form-control" value="<?php echo $row['username']; ?>">
            </div>
          </div><!-- /.form-group -->
          
          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Display Name</label>
            <div class="col-lg-8">
              <input type="text" id="displayname" name="displayname" placeholder="Enter Your Display Name" class="form-control" value="<?php echo $row['displayname']; ?>">
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Address</label>
            <div class="col-lg-8">
              <input type="text" id="address" name="address" placeholder="Enter Your Address" class="form-control" value="<?php echo $row['address']; ?>" data-parsley-length="[25, 250]" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">City</label>
            <div class="col-lg-8">
              <input type="text" id="city" name="city" placeholder="Enter Your City" class="form-control" value="<?php echo $row['city']; ?>" data-parsley-length="[3, 50]" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Zip</label>
            <div class="col-lg-8">
              <input type="text" id="zip" name="zip" placeholder="Enter Your Zip" class="form-control" value="<?php echo $row['zip']; ?>" data-parsley-length="[3, 15]" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Country</label>
            <div class="col-lg-8">
              <input type="text" id="country" name="country" placeholder="Enter Your Country" class="form-control" value="<?php echo $row['country']; ?>" data-parsley-length="[2, 50]" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Contact Phone</label>
            <div class="col-lg-8">
              <input type="text" id="phone" name="phone" placeholder="Enter Your Phone" class="form-control" value="<?php echo $row['phone']; ?>" data-parsley-length="[7, 25]" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Contact Email</label>
            <div class="col-lg-8">
              <input type="text" id="email" name="email" placeholder="Enter Your Email" class="form-control" value="<?php echo $row['email']; ?>" data-parsley-type="email" required>
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