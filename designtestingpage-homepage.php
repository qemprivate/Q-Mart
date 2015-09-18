<?php 

$start=microtime();
$start=explode(" ",$start);
$start=$start[1]+$start[0];
$url_segment = explode("/", $_SERVER['REQUEST_URI']); 

session_start();

include 'include/config.php';

// Select settings
$sqlSettings = "SELECT * FROM settings";

try {
	$querySettings = $db -> query($sqlSettings);

	$querySettings -> setFetchMode(PDO::FETCH_ASSOC);

	$rowSettings = $querySettings -> fetch();

} catch(PDOException $e) {
	die($e -> getMessage());
}

// Select language

if ($_SESSION['lang'] == "") {
	$_SESSION['lang'] = $rowSettings['langid'];
}

$sqlSettings = "SELECT * FROM languages WHERE id = " . $_SESSION['lang'];

try {
	$queryLang = $db -> query($sqlSettings);

	$queryLang -> setFetchMode(PDO::FETCH_ASSOC);

	$rowLang = $queryLang -> fetch();

} catch(PDOException $e) {
	die($e -> getMessage());
}
?>
<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html lang="en_US" class="no-js iem7"> <![endif]-->
<!--[if lt IE 7]> <html class="ie6 lt-ie10 lt-ie9 lt-ie8 lt-ie7 no-js" lang="en_US"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 lt-ie10 lt-ie9 lt-ie8 no-js" lang="en_US"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 lt-ie10 lt-ie9 no-js" lang="en_US"> <![endif]-->
<!--[if IE 9]>    <html class="ie9 lt-ie10 no-js" lang="en_US"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en_US"><!--<![endif]-->

  <head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1" />
<meta name="HandheldFriendly" content="true"/>

<link rel="canonical" href="">

<link rel="stylesheet" href="css/homepage.css?v1.8" type="text/css">
<link rel="stylesheet" href="" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa:300,400' rel='stylesheet' type='text/css'>


<link rel="shortcut icon" href="" type="image/x-icon" sizes="16x16 24x24 32x32 64x64"/>
<link rel="apple-touch-icon" href=""/>
<link rel="apple-touch-icon" sizes="76x76" href=""/>
<link rel="apple-touch-icon" sizes="120x120" href=""/>
<link rel="apple-touch-icon" sizes="152x152" href=""/>
<link rel="image_src" href=""/>

<meta name="description" content="">

<!-- Meta Tag Discoverability -->
<meta property="place:location:latitude" content="13.062616"/>
<meta property="place:location:longitude" content="80.229508"/>
<meta property="business:contact_data:street_address" content="Street Name"/>
<meta property="business:contact_data:locality" content="City Name"/>
<meta property="business:contact_data:postal_code" content="ZIP Code"/>
<meta property="business:contact_data:country_name" content="Country"/>
<meta property="business:contact_data:email" content="cotact@mail.com"/>
<meta property="business:contact_data:phone_number" content="+91 1234567890"/>
<meta property="business:contact_data:website" content="http://www.website.com"/>

<!-- Meta Tag Google Plus -->
<meta itemprop="name" content="Website Name"/>
<meta itemprop="description" content="Website Description"/>
<meta itemprop="image" content="https://website.com/image250X250.png"/>

<!-- Meta Tag Twitter Plus -->
<meta name="twitter:card" content="summary"/>  <!-- Card type -->
<meta name="twitter:site" value="@qwikemart">
<meta name="twitter:title" content="The Qwik-E-Mart">
<meta name="twitter:description" content="Shopping Search Engine"/>
<meta name="twitter:creator" content="Qwik-E-Mart"/>
<meta name="twitter:image:src" content=""/>
<meta name="twitter:domain" content="qwikemart.com"/>
<meta name="twitter:url" value="http://qwikemart.com/">

<!-- Meta Tag Facebook Plus -->
<meta property="og:type" content="profile"/>
<meta property="profile:first_name" content="First Name"/>
<meta property="profile:last_name" content="Last Name"/>
<meta property="profile:username" content=""/>
<meta property="og:title" content="Website Name"/>
<meta property="og:description" content="Website  Description"/>
<meta property="og:image" content="https://qwikemart.com/image250X250.png"/>
<meta property="og:url" content="http://www.qwikemart.com"/>
<meta property="og:site_name" content="Website Name"/>
<meta property="og:see_also" content="http://www.qwikemart.com"/>
<meta property="fb:admins" content="QwikEMart"/>

<meta property="og:url" content="https://qwikemart.com/" />
<meta property="og:site_name" content="Qwik-E-Mart" />
<meta property="og:title" content="Qwik-E-Mart" />

<title>The Qwik-E-Mart</title>

</head>
  
<body class="body--home">

<div class="header clearfix">
	<div class="navigation right clearfix">
		<a href="signin">Sign in</a>
		<span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA0klEQVRIie2QIW4CURRFn0BUVCBYRCWy6M4C2ATpNr5DkjSdkEn+O3c8lpQldAkVLABFEBWTFDGYIRnBpzRpUP8kz5337ss1y2Qy96Msy8dbPEkPf3KAAvgCviXNryw9AZ/AEVilgtw9AAdgCxQmaQ203TR1Xb8kAt56XitpdsF5BvZnx93X5u6b3uIPUCQC3vsBwOuF7yfd92fnw2KMU2AHNJKWVyoad1W2kjapiiQtgAbYxRinZmYWQhhIGqaO96mqavSbI2kYQhjcci+TyfwDJzjynaHiX6QLAAAAAElFTkSuQmCC"/></span>
		<!--<span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAp0lEQVRIie3QIQoCURSF4S8YDIYJLsJo1KwLcBPiNmxGQQQXYRVdgkswuIBJYjAIGsbgGxhkZhjLpPfDK4//nnu4RCKRVuk19Lr/OlNc8MCqZmiAM97Y1yxa4o5ryHZAFt4Tk4rBTcHLMC9xRrgVnAOcCh+vfGsJ258FixJnHNrnzhFmSEP7XUU4DH1PmYVSVSdah6w0ZIMOkprwIv0GThIyI5FIG3wAneAn3nzm41AAAAAASUVORK5CYII="/></span>-->
	</div>
</div>

<div class="site-wrapper site-wrapper--home">
	<div id="" class="content-wrap--home">
		<div id="content_homepage" class="content--home">
			<div class="cw--c">
				<!-- Home Page Search Start -->
				<?php include 'include/homepagesearch.php'; ?>
				<!-- Home Page Search Ends -->
				<div class="spacer"></div>
			<div class="tag-home">
					 Search for what you're looking for. 
					<span class="js-homepage-cta">
					List your "<a href="submit" class="tag-home__link"><span class="verb">Comic Book</span></a>" for free!
					<span class="tag-home__links__sep">|</span>
					</span>
					<a href="" class="tag-home__link">Take a Tour</a>
					
				</div>
				<div class="spacer"></div>
				<!-- Home Page Product Featured Starts -->
				<?php include 'include/testtopproducts.php'; ?>
    			<!-- Home Page Product Featured Ends -->
			</div>
			<!-- cw -->
		</div>
		<!-- content_homepage //-->
	</div>
	<!-- content_wrapper_homepage //-->

	<footer>
<div class="footer-container">
	<div class="footer-left">&copy; 2015 <span class="copyrights">Qwik-E-Mart<span><span>&#8482;</span></div>
		<div class="footer-right">
			<span class="for-desktop">
				<a href="submit" class="footer-link">List your Product</a>
				<a href="" class="footer-link">About</a>
			</span>
		</div>
</div>
</footer>
</div>
<!-- site-wrapper -->
<script src=""></script>
<div class="style=display:none;">
<?php

//record the ending time
	$end=microtime();
	$end=explode(" ",$end);
	$end=$end[1]+$end[0];
	//prints out the page load 
	/* printf($end-$start); */

?>
</div>
<script>
var words = (function(){
  var words = [
      'Dress',
      'Purse',
      'Sneakers',
      'Hat',
      'Fish net',
      'Software',
      'Underwear',
      'Ipad',
      'Candy Bar',
      'Diapers'
      ],
    el = document.querySelector('.verb'),
    currentIndex,
    currentWord,
    prevWord,
    duration = 4000;

  var _getIndex = function(max, min){
    currentIndex = Math.floor(Math.random() * (max - min + 1)) + min;

    //Generates a random number between beginning and end of words array
    return currentIndex;
  };

  var _getWord = function(index){
    currentWord = words[index];

    return currentWord;
  };

  var _clear = function() {

    setTimeout(function(){
      el.className = 'verb';
    }, duration/4);
  };

  var _toggleWord = function(duration){
    setInterval(function(){
      //Stores value of previous word
      prevWord = currentWord;

      //Generate new current word
      currentWord = words[_getIndex(words.length-1, 0)];

      //Generate new word if prev matches current
      if(prevWord === currentWord){

        currentWord = words[_getIndex(words.length-1, 0)];
      }

      //Swap new value
      el.innerHTML = currentWord;

      //Clear class styles
      _clear();

      //Fade in word
      el.classList.add(
        'js-block',
        'js-fade-in-verb'
        );

    }, duration);
  };

  var _init = function(){
    _toggleWord(duration);
  };

  //Public API
  return {
    init : function(){
      _init();
    }
  };
})();

words.init();
</script>
</body>
</html>
