// DOM elements
var buttonLeft  = document.getElementById('page-left');
var buttonRight = document.getElementById('page-right');

// Calculate offset for paging
var tilesLength = 0;
var panelWidth  = $('.panel-body').width();

$('.tiles .tile').each(function() {
  tilesLength += $(this).width();
});

var panelOffset = (tilesLength - panelWidth) * -1;

// Handle paging left
var pageLeft = function() {
  buttonLeft.className = buttonLeft.className + " hide";
  buttonRight.className = buttonRight.className.replace("hide", "");
  
  $('.tile').addClass('bulge');
    
  $('.tiles').animate({
    'left' : '0'
  }, 500, function() {
    $('.tile').removeClass('bulge');
  });
}

// Handle paging right
var pageRight = function() {
  buttonRight.className = buttonRight.className + " hide";
  buttonLeft.className = buttonLeft.className.replace("hide", "");
  
  $('.tile').addClass('bulge');
  
  $('.tiles').animate({
    'left' : panelOffset
  }, 500, function() {
    $('.tile').removeClass('bulge');
  });
}

// Call pageLeft function
buttonLeft.onclick = function() {
  pageLeft();
}

// Call pageRight function
buttonRight.onclick = function() {
  pageRight();
}