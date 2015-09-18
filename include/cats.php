<?php
  
    $SqlCats = "SELECT * FROM cats";
?>

<aside>
	<h1 class="headingfull"><span><?php echo $rowLang['lang2'];?></span></h1>
	<div class="sidewidt">
		<ul class="nav nav-list categories">
			<?php
            	foreach ($db->query($SqlCats) as $rowCat) {
            ?>
			<li><a href="category.php?id=<?php echo $rowCat['id']; ?>"><?php echo $rowCat['cat']; ?></a></li>
			<?php } ?>
		</ul>
	</div>
</aside>