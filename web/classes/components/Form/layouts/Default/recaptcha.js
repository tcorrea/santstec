/* global $ */

// docs for rendering recaptcha widgets:
// https://developers.google.com/recaptcha/docs/display
;(function(){
  'use strict';

  // Scale recaptcha widget to fit within the form container.
  function scaleCaptcha(el) {
    var reCaptchaWidth = 304;
    var formWidth = $(el).closest('form').width();

    if(reCaptchaWidth > formWidth) {
      var captchaScale = formWidth / reCaptchaWidth;
      $(el).closest('.recaptcha-wrap').css({
        'transform':'scale('+captchaScale+')'
      });
    }
  }

  function render(id){
    var el = document.getElementById(id);
    var sitekey = el.getAttribute('data-sitekey');
    window.grecaptcha.render(el, {sitekey: sitekey});

    scaleCaptcha(el);
  }

  function renderQueue() {
    while(window.formWidgetRecaptchaQueue.length) {
      render(window.formWidgetRecaptchaQueue.pop());
    }
  }

  window.recaptchacb = window.recaptchacb || renderQueue;
  if(window.grecaptcha) {
    renderQueue();
  }

})();
