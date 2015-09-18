<?php
  
  session_start();

  $sqlStatment = "SELECT * FROM settings";
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
        <h5> Settings</h5>
      </header>

      <div id="div-1" class="accordion-body collapse in body">
        <form action="functions/update_settings.php" method="post" class="form-horizontal" data-parsley-validate>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Company/Website Name</label>
            <div class="col-lg-8">
              <input type="text" id="wname" name="wname" placeholder="Enter Your Full Name" class="form-control" value="<?php echo $row['sitetitle']; ?>" data-parsley-length="[5, 150]" required>
            </div>
          </div><!-- /.form-group -->


          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Description</label>
            <div class="col-lg-8">
              <textarea rows="4" cols="20" name="description" placeholder="Enter Car Description" class="form-control" data-parsley-length="[50, 250]" required><?php echo $row['wdescription']; ?></textarea>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Keywords</label>
            <div class="col-lg-8">
              <input type="text" id="city" name="keywords" placeholder="Enter Keywords" class="form-control" value="<?php echo $row['wkeywords']; ?>" data-parsley-length="[15, 250]" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">About Us</label>
            <div class="col-lg-8">
              <textarea rows="4" cols="20" name="aboutus" class="form-control" data-parsley-length="[250, 5000]" required><?php echo $row['aboutus']; ?></textarea>
            </div>
          </div><!-- /.form-group -->

          <br/><br/>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Facebook</label>
            <div class="col-lg-8">
              <input type="text" id="facebook" name="facebook" placeholder="Enter Your Facebok URL" class="form-control" value="<?php echo $row['facebook']; ?>" data-parsley-maxlength="150" data-parsley-type="url" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Twitter</label>
            <div class="col-lg-8">
              <input type="text" id="twitter" name="twitter" placeholder="Enter Your Twitter URL" class="form-control" value="<?php echo $row['twitter']; ?>" data-parsley-maxlength="150" data-parsley-type="url" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Linked In</label>
            <div class="col-lg-8">
              <input type="text" id="linkedin" name="linkedin" placeholder="Enter Your Linked In URL" class="form-control" value="<?php echo $row['linkedin']; ?>" data-parsley-maxlength="150" data-parsley-type="url" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">RSS</label>
            <div class="col-lg-8">
              <input type="text" id="rss" name="rss" placeholder="Enter RSS URL" class="form-control" value="<?php echo $row['rss']; ?>" data-parsley-maxlength="150" data-parsley-type="url" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="googleplus" class="control-label col-lg-4">Google Plus</label>
            <div class="col-lg-8">
              <input type="text" id="googleplus" name="googleplus" placeholder="Enter Your Google Plus URL" class="form-control" value="<?php echo $row['google']; ?>" data-parsley-maxlength="150" data-parsley-type="url" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="skype" class="control-label col-lg-4">Skype</label>
            <div class="col-lg-8">
              <input type="text" id="skype" name="skype" placeholder="Enter Your Skype URL" class="form-control" value="<?php echo $row['skype']; ?>" data-parsley-maxlength="150" data-parsley-type="url" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="flickr" class="control-label col-lg-4">Flickr</label>
            <div class="col-lg-8">
              <input type="text" id="flickr" name="flickr" placeholder="Enter Your Linked In URL" class="form-control" value="<?php echo $row['flickr']; ?>" data-parsley-maxlength="150" data-parsley-type="url" required>
            </div>
          </div><!-- /.form-group -->

          

           <br/><br/>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Currency</label>
            <div class="col-lg-8">
              <input type="text" id="ccurrency" name="ccurrency" placeholder="USD" class="form-control" value="<?php echo $row['ccurrency']; ?>" data-parsley-length="[1, 25]" required>
            </div>
          </div><!-- /.form-group -->

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Currency Symbol</label>
            <div class="col-lg-8">
              <input type="text" id="csymbol" name="csymbol" placeholder="USD" class="form-control" value="<?php echo $row['csymbol']; ?>" data-parsley-length="[1, 5]" required>
            </div>
          </div><!-- /.form-group -->


          <br/><br/>

          <div class="form-group">
            <label for="lang" class="control-label col-lg-4">Main Language</label>
            <div class="col-lg-8">
              <select name="lang" id="lang" data-placeholder="Choose a Language..." class="form-control chzn-select" tabindex="2" required>
                    <option selected disabled>Select Language</option>
                <?php
                foreach ($db->query("SELECT id, lang FROM languages ORDER BY lang") as $rowLang) { 
                ?>
                    <option value="<?php echo $rowLang['id']; ?>" <?php echo $row['langid']==$rowLang['id'] ? "selected" : ""; ?>><?php echo $rowLang['lang']; ?></option>
                <?php
                  } 
                ?>
              </select>
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