<?php 
  switch ($page) {
              case 'dashboard':
                $x1 = "active";
                break;

                case 'active':
                $x3 = "active";
                break;

                case 'pending':
                $x4 = "active";
                break;

                case 'rejected':
                $x5 = "active";
                break;

                case 'new':
                $x6 = "active";
                break;

                case 'settings':
                $x7 = "active";
                break;

                case 'profile':
                $x8 = "active";
                break;

                case 'password':
                $x9 = "active";
                break;

                case 'slider':
                $x10 = "active";
                break;

                case 'top':
                $x11 = "active";
                break;

                case 'cats':
                $x12 = "active";
                break;

                case 'ads':
                $x13 = "active";
                break;

                case 'users':
                $x14 = "active";
                break;

                case 'subscribers':
                $x15 = "active";
                break;

                case 'sendemail':
                $x16 = "active";
                break;
              
              default:
                $x1 = "active";
                break;
            }
?>

<div id="left">

    <!-- #menu -->
    <ul id="menu" class="collapse">
      <li class="nav-header">Menu</li>
      <li class="nav-divider"></li>

      <li class="<?php echo $x1; ?>">
        <a href="index.php?p=dashboard">
          <i class="fa fa-dashboard"></i>&nbsp; Dashboard</a>
      </li>

      <li class="<?php echo $x6; ?>">
        <a href="index.php?p=new">
          <i class="fa fa-plus"></i>&nbsp; Add New</a>
      </li>

      <li class="<?php echo $x3; ?>">
        <a href="index.php?p=active">
          <i class="fa fa-check"></i>&nbsp; Active Products</a>
      </li>

      <li class="<?php echo $x4; ?>">
        <a href="index.php?p=pending">
          <i class="fa fa-refresh"></i>&nbsp; Pending Products</a>
      </li>

      <li class="<?php echo $x5; ?>">
        <a href="index.php?p=rejected">
          <i class="fa fa-remove"></i>&nbsp; Rejected Products</a>
      </li>

      <?php
      if ($_SESSION['urole'] == 0) {
      ?>
      <li class="<?php echo $x11; ?>">
        <a href="index.php?p=top">
          <i class="fa fa-star"></i>&nbsp; Top Products</a>
      </li>

      <li class="<?php echo $x10; ?>">
        <a href="index.php?p=slider">
          <i class="fa fa-desktop"></i>&nbsp; Slider</a>
      </li>

      <li class="<?php echo $x12; ?>">
        <a href="index.php?p=cats">
          <i class="fa fa-bars"></i>&nbsp; Categories</a>
      </li>

      <li class="<?php echo $x13; ?>">
        <a href="index.php?p=ads">
          <i class="fa fa-bookmark"></i>&nbsp; Advertising</a>
      </li>

      <li class="<?php echo $x15; ?>">
        <a href="index.php?p=subscribers">
          <i class="fa fa-group"></i>&nbsp; Subscribers</a>
      </li>

      <li class="<?php echo $x16; ?>">
        <a href="index.php?p=sendemail">
          <i class="fa fa-envelope"></i>&nbsp; Send Email</a>
      </li>

      <?php } ?>

      <li class="<?php echo $x8; ?>">
        <a href="index.php?p=profile">
          <i class="fa fa-user"></i>&nbsp; Profile</a>
      </li>

      <?php
      if ($_SESSION['urole'] == 0) {
      ?>
      <li class="<?php echo $x7; ?>">
        <a href="index.php?p=settings">
          <i class="fa fa-gears"></i>&nbsp; Settings</a>
      </li>
      <?php } ?>

      <li class="<?php echo $x9; ?>">
        <a href="index.php?p=password">
          <i class="fa fa-lock"></i>&nbsp; Edit Password</a>
      </li>

      <?php
      if ($_SESSION['urole'] == 0) {
      ?>
      <li class="<?php echo $x14; ?>">
        <a href="index.php?p=users">
          <i class="fa fa-group"></i>&nbsp; Users</a>
      </li>
      <?php } ?>

      <li class="">
        <a href="logout.php">
          <i class="fa fa-power-off"></i>&nbsp; Logout</a>
      </li>


    </ul><!-- /#menu -->

  </div><!-- /#left -->