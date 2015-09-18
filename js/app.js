! function(name, definition) {
  if (typeof module != 'undefined' && module.exports) module.exports = definition();
  else if (typeof define == 'function') define(definition);
  else this[name] = definition();
}('sticky', function() {

  return function sticky(el, top) {

    var requiredOriginalStyles = ['position', 'top', 'left', 'width', 'z-index'];

    var requiredTop = top || 0;
    var originalRect = calcRect(el);
    var styles = {
      position: 'fixed',
      top: requiredTop + 'px',
      left: originalRect.left + 'px',
      width: originalRect.width + 'px',
      'z-index': 9999
    }
    var originalStyles = {}
    requiredOriginalStyles.forEach(function(key) {
      originalStyles[key] = el.style[key];
    });

    var onscroll;
    if (window.onscroll) {
      onscroll = window.onscroll;
    }
    
    window.onscroll = function(event) {
      if (getWindowScroll().top > originalRect.top - requiredTop) {
        for (key in styles) {
          el.style[key] = styles[key];
        }
      } else {
        for (key in originalStyles) {
          el.style[key] = originalStyles[key];
        }
      }
      onscroll && onscroll(event)
    }
  }

  function calcRect(el) {
    var rect = el.getBoundingClientRect();
    var windowScroll = getWindowScroll()
    return {
      left: rect.left + windowScroll.left,
      top: rect.top + windowScroll.top,
      width: rect.width,
      height: rect.height
    }
  }

  function getWindowScroll() {
    return {
      top: window.pageYOffset || document.documentElement.scrollTop,
      left: window.pageXOffset || document.documentElement.scrollLeft
    }
  }

});

/**********Tabs********/
! function(name, definition) {
  if (typeof module != 'undefined' && module.exports) module.exports = definition();
  else if (typeof define == 'function') define(definition);
  else this[name] = definition();
}('tabs', function() {

  return function tabs(container) {
    var tabs = container.querySelectorAll('.stickylink');
    var panes = container.querySelectorAll('.tab-pane');

    each(tabs, function(i, tab) {
      tab.addEventListener('click', function(e) {
        activate(tabs, i);
        activate(panes, i);
      });
    })

    function activate(tabs, index) {
      each(tabs, function(i, tab) {
        if (i != index) {
          removeClass(tab, 'active')
        } else {
          addClass(tab, 'active')
        }
      });
    }
  }

  function each(elements, fn) {
    for (var i = elements.length - 1; i >= 0; i--) {
      fn(i, elements[i]);
    }
  }

  function hasClass(el, cls) {
    return el.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
  }

  function addClass(el, cls) {
    if (!hasClass(el, cls)) {
      el.className += " " + cls;
    }
  }

  function removeClass(el, cls) {
    if (hasClass(el, cls)) {
      var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
      el.className = el.className.replace(reg, '');
    }
  }
});
/**********Tabs********/

/**********Product Gallery********/


/**********Product Gallery********/
