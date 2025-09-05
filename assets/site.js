// Accessible nav: toggle and current page highlighting
(function () {
  const btn = document.querySelector('.nav-toggle');
  const nav = document.getElementById('primary-nav');
  if (btn && nav) {
    btn.addEventListener('click', () => {
      const open = nav.classList.toggle('open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  // Set active link based on current path
  const current = location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('#primary-nav a').forEach(a => {
    const href = a.getAttribute('href');
    if (href === current) {
      a.setAttribute('aria-current', 'page');
      a.classList.add('active');
    }
  });
})();