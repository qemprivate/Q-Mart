<section class="footersocial">
  <div class="container">
    <div class="row">

      <div class="span6 newsletter">
        <div class="fl">
        <div class="control-group">
          <form class="form-horizontal" action="functions/addsubscriber.php" method="POST">
            <div class="">
              <div class="input-prepend">
                <input type="text" name="subscriber" placeholder="<?php echo $rowLang['lang36'];?>" id="inputIcon">
                <button value="Subscribe" class="btn btn-success" type="submit"><?php echo $rowLang['lang11'];?></button>
              </div>
            </div>
          </form>
        </div>
      </div>  
      </div>

      <div class="span6 twitter">
        <div id="footersocial"> 
          <a href="<?php echo $rowSettings['facebook']; ?>" title="Facebook" class="facebook">Facebook</a>
          <a href="<?php echo $rowSettings['twitter']; ?>" title="Twitter" class="twitter">Twitter</a>
          <a href="<?php echo $rowSettings['linkedin']; ?>" title="Linkedin" class="linkedin">Linkedin</a>
          <a href="<?php echo $rowSettings['rss']; ?>" title="rss" class="rss">rss</a>
          <a href="<?php echo $rowSettings['google']; ?>" title="Googleplus" class="googleplus">Googleplus</a>
          <a href="<?php echo $rowSettings['skype']; ?>" title="Skype" class="skype">Skype</a>
          <a href="<?php echo $rowSettings['flickr']; ?>" title="Flickr" class="flickr">Flickr</a>
        </div>
      </div>
      
    </div>
  </div>
</section>

<section class="copyrightbottom">
  <div class="container">
    <div class="row">
      <div class="span6">All rights are copyright to Smart Shop.</div>
      <div class="span6 textright">Developed by <a href="http://microcode.ws/" target="_blank">Micro Code</a>.</div>
 	 </div>
  </div>
</section> 
  
        <a id="gotop" href="#">Back to top</a>