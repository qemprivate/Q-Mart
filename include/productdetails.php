<?php 
  $SqlSpecifications = "SELECT * FROM specifications WHERE pid=" . $_REQUEST['id'];

  $SqlImages = "SELECT * FROM productimages WHERE pid=" . $_REQUEST['id'];

  $SqlReviews = "SELECT * FROM reviews WHERE pid=" . $_REQUEST['id'] . " ORDER BY id DESC";

?>

	<!-- old Product preview -->
	<!--
      <div class="row">
        <div class="span5">

          <ul class="thumbnails mainimage">

          <?php	foreach ($db->query($SqlImages) as $rowimg) {	?>
            <li class="span5">
              <a class="thumbnail cloud-zoom" href="images/products/<?php echo $rowimg['pimage']; ?>">
                <img alt="" src="images/products/<?php echo $rowimg['pimage']; ?>">
              </a>
            </li>
            <?php } ?>
       
          </ul>
           
          <ul class="thumbnails mainimage">

          <?php
            foreach ($db->query($SqlImages) as $rowthumb) {
          ?>
           <li class="producthtumb">
              <a href="#"><span><img style="width=240px; height=240px;" src="images/products/<?php echo $rowthumb['pimage']; ?>" alt=""></span> </a>
            </li>
            <?php } ?>

          </ul>
          
        </div>
       
      </div>
	-->
	<!-- old Product preview -->

<!-- New Product Preview-->
<div id="product-details" class="product-container" style="height: auto;">
		<div id="product-splash" class="in-grid">
			
			<!-- Product Title-->
			<div class="header-wrapper">
				<h1 class="empty-holder" itemprop="name" style="padding-bottom: 0;"><?php echo $rowProduct['ptitle']; ?></h1>
				<div class="brand" style="font-size: 12px;">
   					by <a class="brand-link" href="">Qwik-E-Mart</a>
				</div>
			</div>
			<!-- End Product Title-->
			
			<!-- Pricing Widget -->             
			<div id="pricing-widget-panel">
			<!-- *** ADD SHORT DESCRIPTION HERE **** -->  
			<p style="font-size: 14px;"><?php echo $rowProduct['shortdesc']; ?></p>         
			<!-- *** ADD SHORT DESCRIPTION HERE **** --> 
				<div id="pricing-widget-container" class="pricing-widget-container vmiddle" data-route="pricing">
						<div class="pricing-widget-sticky add-to-cart view-360" style="display: block;">
							<div class="phone-name moto-logo-mobile">
								<h4>moto 360</h4>
								<h3 class="desktop-tablet-only"><span class="price semibold"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowProduct['oldprice'],2); ?> | <?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowProduct['nprice'],2); ?></span></h3>
								<div class="promotion-msg desktop-tablet-only">
									<div class="contentasset">
									<li>
									<?php if($rowProduct['shipping'] != "") { ?>
									<p><?php echo $rowProduct['shipping']; ?></p>
									<?php } ?>
									</li>
									<li>
										 <span><span class="in_stock"><?php echo $rowLang['lang51'];?></span>: <?php echo $rowProduct['availability']; ?></span>
									</li>
									<li>
									<span>From:<a href=""></a></span>
									</li>
									</div>
									<!-- End content asset -->
								</div>
							</div>
							<div class="buy-button-container">
								<a href="<?php echo $row['url']; ?><?php echo $rowProduct['url']; ?>" target="_blank"><button id="buy" class="btn btn-default blue-btn">Bag it</button></a>
							</div>
							<div class="utilities mart12 desktop-only hide-tablet">
								<ul>
									<li><a class="btn btn-default" id="share" href="">Share </a></li>
									<li class="last-child"><a class="btn btn-default" href="" target="_blank">Help </a></li>
								</ul>
							</div>
						</div>
					
				</div>
			</div>
			<!-- End Pricing Widget -->
			
			<!-- Product preview -->
			<div class="preview-pane" id="product-preview-panel">
				<div class="image-gallery-view">
					<div class="image-gallery-container">
						<?php	foreach ($db->query($SqlImages) as $rowimg) {	?>
						<div class="image-gallery-viewport">
							<img src="images/products/<?php echo $rowimg['pimage']; ?>" id="heroImage" alt="heroImage">
						
						</div>
						<?php } ?>
						<div class="thumbnail-container">
						<?php foreach ($db->query($SqlImages) as $rowthumb) { ?>
							<div class="thumbnail-inner-container">
								<span class="thumbnail"><img id="thumbnail1" src="images/products/<?php echo $rowthumb['pimage']; ?>" alt="thumbnail1" data-view="front-34" class="selected"></span>
								</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- End Product preview -->
			
		</div>
	</div>
<!-- End New Product Preview-->
      
<div class="information-container">     
      	<!-- Product Sticky tab -->
    	<div class="sticky-wrapper" style="height: 80px;">
		<div class="sticky-nav desktop-only">
			<div class="in-grid">
				<div class="inner">
					<ul class="nav">
						<li><a class="stickylink active"><?php echo $rowLang['lang46'];?></a></li>
						<li><a class="stickylink"><?php echo $rowLang['lang47'];?></a></li>
						<li><a class="stickylink"><?php echo $rowLang['lang48'];?></a></li>
						<li><a class="stickylink"><?php echo $rowLang['lang49'];?></a></li>
					</ul>
              
				</div>
			</div>
		</div>
	</div>
      	<!-- End Product Sticky tab -->
      
		<!-- Product Description tab & comments-->
		<div class="productdesc">
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
                    <?php echo $rowProduct['pdescription']; ?>
                  </div>
                  <div class="tab-pane " id="specification">
                    <ul class="productinfo">

                      <?php
                      foreach ($db->query($SqlSpecifications) as $rowSp) {
                      ?>
                      <li>
                        <span class="productinfoleft"><?php echo $rowSp['speci']; ?>:</span> <?php echo $rowSp['pvalue']; ?> </li>
                      <?php } ?>

                    </ul>
                  </div>

                  <div class="tab-pane" id="review">

                    <ul class="reveiw">
                      <?php
                        foreach ($db->query($SqlReviews) as $rowReview) {
                      ?>
                      <li>
                        <h4 class="title"><?php echo $rowReview['rtitle']; ?> <span class="date"><i class="icon-calendar"></i> <?php echo $rowReview['rdate']; ?> </span></h4>
                        <ul class="rate">
                          <li class="<?php echo $rowReview['rrate']>=1 ? "on" : "off"; ?>"></li>
                          <li class="<?php echo $rowReview['rrate']>=2 ? "on" : "off"; ?>"></li>
                          <li class="<?php echo $rowReview['rrate']>=3 ? "on" : "off"; ?>"></li>
                          <li class="<?php echo $rowReview['rrate']>=4 ? "on" : "off"; ?>"></li>
                          <li class="<?php echo $rowReview['rrate']>=5 ? "on" : "off"; ?>"></li>
                        </ul>
                        <span class="reveiwdetails"> <?php echo $rowReview['rdesc']; ?></span>
                      </li>
                      <?php } ?>

                    </ul>

                    <h3><?php echo $rowLang['lang54'];?></h3>
                    <form class="form-vertical" action="functions/addreview.php?pid=<?php echo $rowProduct['id']; ?>" method="POST">
                      <fieldset>
                        <div class="control-group">
                          <label class="control-label"><?php echo $rowLang['lang55'];?></label>
                          <div class="controls">
                            <input name="rtitle" type="text" class="span3">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><?php echo $rowLang['lang56'];?></label>
                          <div class="controls">
                            <select name="rrate">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5" selected>5</option>
                            </select>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><?php echo $rowLang['lang46'];?></label>
                          <div class="controls">
                            <textarea name="rdesc" rows="3"  class="span3"></textarea>
                          </div>
                        </div>
                      </fieldset>
                      <input type="submit" class="btn btn-success" value="<?php echo $rowLang['lang53'];?>">
                    </form>
                  </div>

                  <div class="tab-pane" id="seller">
                    <form class="form-vertical" action="functions/contactseller.php?sid=<?php echo $rowProduct['sellerid']; ?>&pid=<?php echo $rowProduct['id']; ?>" method="POST">
                      <fieldset>
                        <div class="control-group">
                          <label class="control-label"><?php echo $rowLang['lang32'];?></label>
                          <div class="controls">
                            <input name="mtitle" type="text" class="span3">
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label"><?php echo $rowLang['lang28'];?></label>
                          <div class="controls">
                            <input name="email" type="text" class="span3">
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label"><?php echo $rowLang['lang33'];?></label>
                          <div class="controls">
                            <textarea name="msg" rows="6"  class="span6"></textarea>
                          </div>
                        </div>
                      </fieldset>
                      <input type="submit" class="btn btn-success" value="<?php echo $rowLang['lang34'];?>">
                    </form>
                  </div>

                </div>
              </div>
		<!-- End Product Description tab & comments-->
      
     </div>
              
