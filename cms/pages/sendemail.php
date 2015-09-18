<?php
  
  session_start();

?>
<div class="row">
	<div class="col-lg-2">
	</div>
  <div class="col-lg-8">
    <div class="box dark">
      <header>
        <div class="icons">
          <i class="fa fa-envelope"></i>
        </div>
        <h5>Send Email To Subscribers</h5>
      </header>

      <div id="div-1" class="accordion-body collapse in body">
        <form action="functions/sendemail2sub.php" method="post" class="form-horizontal" data-parsley-validate>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Title</label>
            <div class="col-lg-8">
              <input type="text" name="mtitle" placeholder="Message Title" class="form-control" data-parsley-length="[5, 150]" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="pass1" class="control-label col-lg-4">Message</label>
            <div class="col-lg-8">
              <textarea rows="4" cols="20" name="msg" class="form-control" data-parsley-length="[100, 2000]" required></textarea>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <div>
              <center><button class="btn btn-lg btn-success" type="submit"><i class="fa fa-envelope"></i> Send</button></center>
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