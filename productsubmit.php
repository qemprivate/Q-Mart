<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>The Qwik-E-Mart</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="css/homepage.css?v=1.0">
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
 
 <h2 class="cd-headline rotate-1">
			<span>List Your</span>
			<span class="verb">Comic Book</span>
      </h2>
 
	<!-- run javascript at the end -->
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