<?php
  
  /* Get  manufacturers */
    $SqlUsers = "SELECT * FROM users";

?>

<p></p>

  
      
  <div class="col-lg-12">
        <div class="box">
          <header>
            <h5>Users</h5>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($db->query($SqlUsers) as $row) {
                ?>
                <tr>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['role']==0 ? "Administrator" : "Seller"; ?></td>
                  <td>
                  <?php
                  if ($_SESSION['admin'] != $row['user_id']) {                  
                  ?>
                  <a href="index.php?p=edituser&uid=<?php echo $row['user_id']; ?>" class="btn btn-default btn-sm"> Edit </a>
                  <a href="functions/remove_user.php?id=<?php echo $row['user_id']; ?>" class="btn btn-danger btn-sm"> Delete </a>
                  <?php } ?>
                  </td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
  </div><!-- /.col-lg-6 -->
<br/>
<br/>
<p><h3>Add New User</h3></p>
<div class="col-lg-6">
  <form role="form" action="functions/register.php" method="post" class="form-control-2x" data-parsley-validate>
                                
      <div class="form-group">
          <label for="fname">Full Name</label>
          <input type="text" name="username" class="form-control" placeholder="Enter Username name">
      </div>

      <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" class="form-control" placeholder="Enter user address" data-parsley-length="[5, 250]" required>
      </div>

      <div class="form-group">
          <label for="city">City</label>
          <input type="text" name="city" class="form-control" placeholder="Enter city" data-parsley-length="[2, 50]" required>
      </div>

      <div class="form-group">
          <label for="zip">Zip</label>
          <input type="text" name="zip" class="form-control" placeholder="Enter your zip code" data-parsley-length="[5, 15]" required>
      </div>

      <div class="form-group">
          <label for="country">Country</label>
          <input type="text" name="country" class="form-control" placeholder="Enter user country" data-parsley-length="[2, 50]" required>
      </div>

      <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" name="phone" class="form-control" placeholder="Enter phone" data-parsley-type="digits" data-parsley-length="[5, 25]" required>
      </div>

      <div class="form-group">
        <label for="urole">Role</label>
          <select name="urole" class="form-control" tabindex="2" required>
            <option value="0">Administrator</option>
            <option value="1">Editor</option>
          </select>
      </div><!-- /.form-group -->

      <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Enter email" data-parsley-length="[5, 75]" required>
      </div>

      <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" data-parsley-length="[5, 25]" required>
      </div>

      <div class="form-group">
          <label for="repassword">Password Confirm</label>
          <input type="password" name="repassword" class="form-control" placeholder="Enter password" data-parsley-equalto="#password" required>
      </div>

      <br/>

      <div class="form-group">
          <center><button type="submit" class="btn btn-default">Save</button></center>
      </div>
          
  </form>

</div>