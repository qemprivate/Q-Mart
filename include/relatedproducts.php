<?php
  $sqlRelatedProducts = "SELECT * FROM products WHERE pstatus=1 ORDER BY RAND() LIMIT 4";
?>
    <div class="container">
      <h1 class="headingfull"><span><?php echo $rowLang['lang52'];?></span></h1>
      <section id="thumbnails">
      <div class="sidewidt" style="padding:10px;">
        <ul class="thumbnails">

        <?php
          foreach ($db->query($sqlRelatedProducts) as $rowRelatedProducts) {
        ?>
      <li class="span3">  
        <a class="prdocutname" href="product.php?p=<?php echo $rowRelatedProducts['pseo']; ?>&id=<?php echo $rowRelatedProducts['id']; ?>"><?php echo substr($rowRelatedProducts['ptitle'],0,23) . "..." ?></a>
        <div class="thumbnail"> 
          <span class="<?php echo $rowRelatedProducts['saleoffer']; ?> tooltip-test" data-original-title=""></span>
          <a href="product.php?p=<?php echo $rowRelatedProducts['pseo']; ?>&id=<?php echo $rowRelatedProducts['id']; ?>"><span><span><img style="width:250px; height:200px;" alt="" src="images/products/<?php echo $rowRelatedProducts['pimage'] ?>" ></span></span> </a>
          <div class="caption">
            <div class="price pull-left"> 
              <span class="oldprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowRelatedProducts['oldprice'],2); ?></span>
              <span class="newprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowRelatedProducts['nprice'],2); ?></span>
            </div>  
            <a class="btn pull-right" href="product.php?p=<?php echo $rowRelatedProducts['pseo']; ?>&id=<?php echo $rowRelatedProducts['id']; ?>"><?php echo $rowLang['lang14'];?></a>
            <div class="clearfix"></div>

          </div>
        </div>
      </li>
      <?php } ?>

      </ul>
        </div>
      </section>
    </div>