

$(window).load(function() {
  if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') == -1) || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {
  // スマホ・タブレット用javascript
  } else {
    $('.js-element-erase').children().contents().unwrap();
  }
});
