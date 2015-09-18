<?php

  $sqlFeaturedProducts = "SELECT * FROM products WHERE topproduct=1 AND pstatus = 1 ORDER BY RAND() LIMIT 9";

?>

<section id="featured">
  <h1 class="headingfull"><span><?php echo $rowLang['lang12'];?></span></h1>
  <div class="sidewidt">
    <ul class="thumbnails">

    <?php
      foreach ($db->query($sqlFeaturedProducts) as $rowFeaturedProducts) {
    ?>
      <li class="span3">	
        <a class="prdocutname" href="product.php?p=<?php echo $rowFeaturedProducts['pseo']; ?>&id=<?php echo $rowFeaturedProducts['id']; ?>"><?php echo substr($rowFeaturedProducts['ptitle'],0,25) . "..." ?></a>
        <div class="thumbnail">	
          <span class="<?php echo $rowFeaturedProducts['saleoffer']; ?> tooltip-test" data-original-title=""></span>
          <a href="product.php?p=<?php echo $rowFeaturedProducts['pseo']; ?>&id=<?php echo $rowFeaturedProducts['id']; ?>"><span><span><img style="width:250px; height:200px;" alt="" src="images/products/<?php echo $rowFeaturedProducts['pimage'] ?>" ></span></span> </a>
          <div class="caption">
            <div class="price pull-left">	
              <span class="oldprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowFeaturedProducts['oldprice'],2); ?></span>
              <span class="newprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowFeaturedProducts['nprice'],2); ?></span>
            </div>	
            <a class="btn pull-right" href="product.php?p=<?php echo $rowFeaturedProducts['pseo']; ?>&id=<?php echo $rowFeaturedProducts['id']; ?>"><?php echo $rowLang['lang14'];?></a>
            <div class="clearfix"></div>

          </div>
        </div>
      </li>
      <?php } ?>

    </ul>
  </div>
</section>