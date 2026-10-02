(function () {
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.getElementById('site-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  var ta = document.querySelector('textarea[data-counter]');
  if (ta) {
    var out = document.getElementById(ta.getAttribute('data-counter'));
    var update = function () { if (out) out.textContent = ta.value.length; };
    ta.addEventListener('input', update);
    update();
  }
})();
