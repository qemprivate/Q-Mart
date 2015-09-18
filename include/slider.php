<?php

	$sqlSlider = "SELECT * FROM sliderimages";

?>
<section class="slider">
	<div class="container">
		<div class="slider-wrapper theme-default">

			<div id="slider" class="nivoSlider">
				<?php
	                foreach ($db->query($sqlSlider) as $rowSlider) {
	              ?>
				<img src="images/slider/<?php echo $rowSlider['simage']; ?>" data-thumb="images/slider/<?php echo $rowSlider['simage']; ?>" />
				<?php } ?>

			</div>

		</div>
	</div>
</section>