<section id="featured">
    <h1 class="productname"><?php echo $rowLang['lang17']; ?></h1>
    <p> <?php echo $rowLang['lang18']; ?>, <a href="login.php"><?php echo $rowLang['lang19']; ?></a>.</p>
    
     <form class="form-horizontal" action="functions/register.php" method="POST">
            <h3 class="heading3"><?php echo $rowLang['lang27']; ?></h3>
            <div class="registerbox">
              <fieldset>
              <div class="control-group">
                  <label class="control-label">Username:</label>
                  <div class="controls">
                    <input type="text" name="username" id="username" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><?php echo $rowLang['lang28']; ?>:</label>
                  <div class="controls">
                    <input type="email" name="email" id="email" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><?php echo $rowLang['lang29']; ?>:</label>
                  <div class="controls">
                    <input type="password" name="password" id="password" class="input-xlarge">
                  </div>
                </div>
              </fieldset>
            </div>
            <hr>

            <center><input type="Submit" value="<?php echo $rowLang['lang31']; ?>" class="btn btn-success"></center> 

          </form>
          <div class="clearfix"></div>     
  </section>