<div class="main-bar">
<h3>
	<?php

	    switch ($page) {
	      case 'dashboard':
	        echo '<i class="fa fa-dashboard"></i> Dashboard';
	        break;

	        case 'profile':
	        echo '<i class="fa fa-user"></i> Profile';
	        break;

	        case 'new':
	        echo '<i class="fa fa-plus"></i> Add New Products';
	        break;

	        case 'active':
	        echo '<i class="fa fa-check"></i> Approved Products';
	        break;

	        case 'pending':
	        echo '<i class="fa fa-refresh"></i> Pending Products';
	        break;

	        case 'rejected':
	        echo '<i class="fa fa-remove"></i> Rejected Products';
	        break;

	        case 'top':
	        echo '<i class="fa fa-bookmark"></i> Top Products';
	        break;

	        case 'slider':
	        echo '<i class="fa fa-desktop"></i> Slider';
	        break;

	        case 'settings':
	        echo '<i class="fa fa-gears"></i> Settings';
	        break;

	        case 'cats':
	        echo '<i class="fa fa-bars"></i> Categories';
	        break;

	        case 'ads':
	        echo '<i class="fa fa-bookmark"></i> Advertising';
	        break;

	        case 'password':
	        echo '<i class="fa fa-lock"></i> Edit Password';
	        break;

	        case 'users':
	        echo '<i class="fa fa-group"></i> Users';
	        break;
	      
	      default:
	        echo '<i class="fa fa-dashboard"></i> Dashboard';
	        break;
	    }
    ?>
  </h3>
</div>