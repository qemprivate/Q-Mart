<?php
  
  /* Get  manufacturers */
    $Sqlcats = "SELECT * FROM subscribers";

?>

<p></p>
      
	<div class="col-lg-12">
        <div class="box">
          <header>
            <h5>Subscribers</h5>
            <div class="toolbar">
              <div class="btn-group">
                <a href="#stripedTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                  <i class="icon-chevron-up"></i>
                </a>
              </div>
            </div>
          </header>
          <div id="stripedTable" class="body collapse in">
            <table class="table table-striped responsive-table">
              <thead>
                <tr>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($db->query($Sqlcats) as $row) {
                ?>
                <tr>
                  <td><?php echo $row['subscriber']; ?></td>
                  <td>
                  <a href="functions/remove_subscriber.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"> Delete </a>
                  </td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div><!-- /.col-lg-6 -->

</div>