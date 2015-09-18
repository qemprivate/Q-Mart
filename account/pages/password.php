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
          <style>
          .btn{cursor:pointer;display:-moz-inline-stack;display:inline-block;*display:inline;font-weight:bold;font-size:0.95em;line-height:1.25em;overflow:visible;padding:7px;width:auto;zoom:1;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;}
.btn:hover{text-decoration:none!important;box-shadow:0 1px 2px rgba(0,0,0,.2);-moz-box-shadow:0 1px 2px rgba(0,0,0,.2);-webkit-box-shadow:0 1px 2px rgba(0,0,0,.2);}
.btn:active{position:relative;top:1px;box-shadow:inset 0 0 10px rgba(0,0,0,.3);-moz-box-shadow:inset 0 0 10px rgba(0,0,0,.3);-webkit-box-shadow:inset 0 0 10px rgba(0,0,0,.3);}

.digg-it-large{background-position:-138px -22px;height:13px;width:9px;vertical-align:-2px;}

.btn-special{background:-webkit-gradient(linear,left top,left bottom,from(#fff),to(#e3ecf6));background:-moz-linear-gradient(top,#fff,#e3ecf6);background-color:#e3ecf6;border:1px solid #1b5790;color:#105cb6;padding-bottom:7px;padding-top:6px;text-shadow:#fff 0 1px 0;}
.btn-special:active{background:#e3ecf6;}

          </style>
        <button type="submit" name="submit" class="btn btn-special has-tooltip" id="submit-create">Save <span class="sprite digg-it-large"></span></button>
          
        </form>
      </div>
    </div>
  </div>

	<div class="col-lg-2">
	</div>

  <!--END SELECT-->
</div><!-- /.row -->