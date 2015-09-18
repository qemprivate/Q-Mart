<?php

  $sqlTopProducts = "SELECT * FROM products WHERE topproduct=1 ORDER BY RAND() LIMIT 5";

?>

<aside>
 <h1 class="headingfull"><span><?php echo $rowLang['lang13'];?></span></h1>
	<div class="sidewidt">
		 <ul class="bestseller">
      <?php
        foreach ($db->query($sqlTopProducts) as $rowTopProducts) {
      ?>
			 <li>
          <img width="50" height="50" src="images/products/<?php echo $rowTopProducts['pimage'] ?>">
          <a class="productname" href="product.php?p=<?php echo $rowTopProducts['pseo']; ?>&id=<?php echo $rowTopProducts['id']; ?>"> <?php echo substr($rowTopProducts['ptitle'],0,13) . "..." ?></a>
          <span class="procategory"><?php echo $rowTopProducts['cattxt'] ?></span>
          <span class="price"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowTopProducts['nprice'],2) ?></span>
        </li>
        <?php } ?>

      </ul>
    </div>
 </aside>