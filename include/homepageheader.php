
    <div class="span4">
      <a href="index.php" class="logo"><img title="Smart Shop" alt="Smart Shop Logo" src="images/logo.png"></a>
    </div>
    <div class="search-wrap--home">
     <form action="category.php?p=search" method="POST" class="search--home search--adv">
      <div class="span6 pull-left">
        <input type="text" name="skeyword" class="search__input--adv" value="<?php echo $rowLang['lang35'];?>..." onfocus="if (this.value=='Search here...') this.value='';" onblur="if (this.value=='') this.value='Search here...';">
		<input id="search_button_homepage" class="search__button  js-search-button" tabindex="2" value="S" type="submit">
		<!--<button value="Search" class="search__button" type="submit"><?php echo $rowLang['lang10'];?></button>-->
	  </div>
      </form>
    </div>
	
<style>
.search-wrap--home {
    padding: 1.3em 0.8em 1em;
    max-width: 634px;
    margin-left: auto;
    margin-right: auto;
    display: block;
    float: none;
    width: 70%;
}
.search--home {
    font-size: 1.14em;
}
.search--adv {
    padding-right: 3.5em;
}
.search, .search--adv {
    box-sizing: border-box;
    border-radius: 2px;
    display: block;
    position: relative;
    height: 2.8em;
    background-color: #FFF;
    border: 1px solid #CCCDC8;
    padding-left: 0.75em;
    padding-right: 6.5em;
}
.search__input, .search__input--adv {
    -moz-appearance: none;
    font-size: 1.1em;
    font-family: "DDG_ProximaNova","DDG_ProximaNova_UI_0","DDG_ProximaNova_UI_1","DDG_ProximaNova_UI_2","DDG_ProximaNova_UI_3","DDG_ProximaNova_UI_4","DDG_ProximaNova_UI_5","DDG_ProximaNova_UI_6","Proxima Nova","Helvetica Neue","Helvetica","Segoe UI","Nimbus Sans L","Liberation Sans","Open Sans",FreeSans,Arial,sans-serif;
    font-weight: normal;
    display: block;
    width: 100%;
    background: transparent none repeat scroll 0% 0%;
    outline: medium none;
    border: medium none;
    padding: 0px;
    height: 2.54545em;
    z-index: 1;
    position: relative;
    top: -1px;
}
.search__button {
    border-radius: 2px;
    min-width: 26px;
    color: #838383;
    font-size: 1.25em;
    padding: 0px 0.64em;
    height: auto;
    min-height: 1.8em;
    margin-top: 2px;
    margin-bottom: 2px;
    line-height: 1.5;
    background-color: transparent;
    background-position: 50% 50%;
    background-repeat: no-repeat;
}
.search__clear, .search__button, .search__button--hero {
    -moz-appearance: none;
    box-sizing: content-box;
    font-family: "ddg-serp-icons" !important;
    font-style: normal;
    font-weight: normal !important;
    font-variant: normal;
    text-transform: none;
    text-decoration: none !important;
    width: 1em;
    display: block;
    cursor: pointer;
    background: transparent none repeat scroll 0% 0%;
    text-align: center;
    border: medium none;
    height: 2.45em;
    line-height: 2.45em;
    position: absolute;
    top: 0px;
    bottom: 0px;
    right: 2px;
    left: auto;
    margin: auto;
    z-index: 2;
    outline: medium none;
}
</style>	