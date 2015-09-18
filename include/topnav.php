<div id="main-nav" class="navbar navbar-fixed-top">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <ul class="nav">
          <li><a href="#"><i class="icon-envelope"></i> <?php echo $rowSettings['email']; ?></a></li>
          <li><a href="#"><i class="icon-phone-sign"></i> <?php echo $rowSettings['phone']; ?></a></li>          
      </ul>
      <nav style="height:0px" class="nav-collapse collapse">
        <ul class="nav pull-right">
          <li><a href="index.php"><i class="icon-home"></i></a></li>
          <li class="dropdown hover"><a data-toggle="" class="dropdown-toggle" href="#"><?php echo $rowLang['lang43'];?> <b class="caret"></b></a>
            <ul class="dropdown-menu topcart">
            
            <?php
              foreach ($db->query("SELECT id, lang FROM languages ORDER BY lang") as $rowLangs) {
            ?>
              <li><a href="language.php?id=<?php echo $rowLangs['id']; ?>"><?php echo $rowLangs['lang']; ?></a></li>
            <?php } ?>

            </ul>
          </li>
          <li><a href="register.php"><?php echo $rowLang['lang8'];?></a></li>
          <li><a href="contacts.php"><?php echo $rowLang['lang6'];?></a></li>
       </ul>
      </nav>
    </div>
  </div>