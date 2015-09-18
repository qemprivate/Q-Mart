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

	        case 'password':
	        echo '<i class="fa fa-lock"></i> Edit Password';
	        break;

	      
	      default:
	        echo '<i class="fa fa-dashboard"></i> Dashboard';
	        break;
	    }
    ?>
  </h3>
</div>