<div class="topnav">
  <div class="btn-toolbar">
    <div class="btn-group">
      <a data-placement="bottom" data-original-title="Show / Hide Sidebar" data-toggle="tooltip" class="btn btn-success btn-sm" id="changeSidebarPos">
        <i class="fa fa-expand"></i>
      </a>
    </div>

    <?php
    if ($_SESSION['urole'] == 0) {
    ?>
    <div class="btn-group">
      <a href="index.php?p=settings" data-placement="bottom" data-original-title="Settings" href="#" data-toggle="tooltip" class="btn btn-default btn-sm">
        <i class="fa fa-gear"></i>
      </a>
    </div>
    <?php } ?>

    <div class="btn-group">
      <a href="logout.php" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </div>
</div><!-- /.topnav -->