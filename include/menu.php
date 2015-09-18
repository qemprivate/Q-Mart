<?php
  
    $SqlCatsMenu = "SELECT * FROM cats";
?>

<div  id="categorymenu">
  <div class="container">
    <nav class="subnav">
      <ul class="nav-pills categorymenu <?php echo $rowLang['dircetionx']=="rtl" ? "pull-right" : ""; ?>">
        <li><a class="active" href="index.php"><?php echo $rowLang['lang1'];?></a></li>

        <li><a href="category.php"><?php echo $rowLang['lang2'];?></a>
          <div>
            <ul class="arrow">
              <?php
                foreach ($db->query($SqlCatsMenu) as $rowCatMenu) {
              ?>
              <li><a href="category.php?id=<?php echo $rowCatMenu['id']; ?>"><?php echo $rowCatMenu['cat']; ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </li>

        <li><a href="category.php?p=offers"><?php echo $rowLang['lang3'];?></a></li>

        <li><a href="category.php?p=sale"><?php echo $rowLang['lang4'];?></a></li>

        <li><a href="register.php"><?php echo $rowLang['lang7'];?></a></li>

        <li><a href="login.php"><?php echo $rowLang['lang5'];?></a></li>
        
        <li><a href="contacts.php"><?php echo $rowLang['lang6'];?></a></li>
      </ul>
    </nav>
  </div>
</div>