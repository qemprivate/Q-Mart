          <form method="post" action="functions/sendemail.php" class="form-horizontal contactform span5" data-parsley-validate>
            <fieldset>

              <div class="control-group">
                <label class="control-label" for="email"><?php echo $rowLang['lang28'];?> :</label>
                <div class="controls">
                  <input type="email" name="email" id="email" class="required email span3" data-parsley-length="[5, 75]" required>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label" for="contact"><?php echo $rowLang['lang32'];?> :</label>
                <div class="controls">
                  <input type="text" name="msubject" value="" id="msubject" class="required span3" data-parsley-length="[15, 150]" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="message"><?php echo $rowLang['lang33'];?> :</label>
                <div class="controls">
                  <textarea name="message" id="message" cols="40" rows="6" class="required span3" data-parsley-length="[150, 5000]" required></textarea>
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" id="submit_id" value="<?php echo $rowLang['lang34'];?>" class="btn btn-success">
              </div>

            </fieldset>
          </form>