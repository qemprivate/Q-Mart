<div class="container">
  <div class="row">
    <div class="span4">
      <a href="index.php" class="logo"><img title="Smart Shop" alt="Smart Shop Logo" src="images/logo.png"></a>
    </div>
    <div class="span8">
     <form action="category.php?p=search" method="POST" class="form-search marginnull topsearch pull-right">
      <div class="span6 pull-left">
        <button value="Search" class="btn btn-success pull-right search" type="submit"><?php echo $rowLang['lang10'];?></button>
        <input type="text" name="skeyword" class="span5 search-query search-icon-top pull-right" value="<?php echo $rowLang['lang35'];?>..." onfocus="if (this.value=='Search here...') this.value='';" onblur="if (this.value=='') this.value='Search here...';">
      </div>
      </form>
    </div>
  </div>
</div>