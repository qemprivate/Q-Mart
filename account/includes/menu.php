<?php 
  switch ($page) {
              case 'dashboard':
                $x1 = "active";
                break;

                case 'active':
                $x2 = "active";
                break;

                case 'pending':
                $x3 = "active";
                break;

                case 'rejected':
                $x4 = "active";
                break;

                case 'new':
                $x5 = "active";
                break;

                case 'profile':
                $x6 = "active";
                break;

                case 'password':
                $x7 = "active";
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

      <li class="<?php echo $x5; ?>">
        <a href="index.php?p=new">
          <i class="fa fa-plus"></i>&nbsp; Add New</a>
      </li>

      <li class="<?php echo $x2; ?>">
        <a href="index.php?p=active">
          <i class="fa fa-check"></i>&nbsp; Active Products</a>
      </li>

      <li class="<?php echo $x3; ?>">
        <a href="index.php?p=pending">
          <i class="fa fa-refresh"></i>&nbsp; Pending Products</a>
      </li>

      <li class="<?php echo $x4; ?>">
        <a href="index.php?p=rejected">
          <i class="fa fa-remove"></i>&nbsp; Rejected Products</a>
      </li>

      

      <li class="<?php echo $x6; ?>">
        <a href="index.php?p=profile">
          <i class="fa fa-user"></i>&nbsp; Profile</a>
      </li>

      <li class="<?php echo $x7; ?>">
        <a href="index.php?p=password">
          <i class="fa fa-lock"></i>&nbsp; Edit Password</a>
      </li>


      <li class="">
        <a href="logout.php">
          <i class="fa fa-power-off"></i>&nbsp; Logout</a>
      </li>


    </ul><!-- /#menu -->

  </div><!-- /#left -->