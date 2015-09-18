<?php	
$TopProducts = "SELECT * FROM products WHERE topproduct=1 AND pstatus = 1 ORDER BY RAND() LIMIT 4";	
$data = $db->query($TopProducts);
?>

<div class="internal-navbar">
	<div class="panel-body">
		<ul class="tiles">
<?php	foreach ($data as $rowTopProducts) {	?>
       		<li class="tile">
			<a class="productname" href="product.php?p=<?php echo $rowTopProducts['pseo']; ?>&id=<?php echo $rowTopProducts['id']; ?>" target="_blank">
         		<img style="width:auto; height:48px;" src="images/products/<?php echo $rowTopProducts['pimage'] ?>">
			</a>
			<div class="tile-body"> <?php echo substr($rowTopProducts['ptitle'],0,21) . "..."; ?></div>
         	<div class="price" style="color: #373d48;font-weight: bold;">
         		<span class="tile-body"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowTopProducts['nprice'],2) ?></span>
        <!--	<span class="proldprice"><?php echo $rowSettings['csymbol']; ?><?php echo number_format($rowTopProducts['oldprice'],2); ?></span>-->
			</div>
			</li>
<?php } ?>
     	</ul>
  	</div>
</div>
<span class="sponsored-label"> Sponsored </span>