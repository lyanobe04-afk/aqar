(() => {
  'use strict';
  const dialog = document.getElementById('demo-notice');
  const notify = label => {
    document.getElementById('demo-notice-message').textContent = `${label} is a preview control.`;
    if (!dialog.open) dialog.showModal();
  };
  document.addEventListener('click', event => {
    const mode = event.target.closest('[data-view-mode]');
    if (mode) {
      const grid = mode.dataset.viewMode === 'grid';
      document.getElementById('propertyGridContainer').hidden = !grid;
      const list = document.getElementById('propertyListContainer');
      list.classList.remove('hidden'); list.hidden = grid;
      document.querySelectorAll('[data-view-mode]').forEach(button => {
        const active = button === mode;
        button.setAttribute('aria-pressed', String(active));
        button.classList.toggle('bg-surface-container-lowest', active);
        button.classList.toggle('shadow-sm', active);
      });
      return;
    }
    const control = event.target.closest('[data-demo]');
    if (control) { event.preventDefault(); notify(control.dataset.demo); return; }
    if (!event.target.closest('.manager-sidebar,#sidebar-toggle')) {
      document.body.classList.remove('sidebar-open');
      document.getElementById('sidebar-toggle').setAttribute('aria-expanded', 'false');
    }
  });
  document.addEventListener('submit', event => {
    if (event.target.closest('#demo-notice')) return;
    event.preventDefault(); notify('Form submission');
  });
  document.addEventListener('change', event => {
    if (event.target.type === 'file') { event.target.value = ''; notify('File upload'); }
  });
  document.getElementById('sidebar-toggle').addEventListener('click', event => {
    const open = document.body.classList.toggle('sidebar-open');
    event.currentTarget.setAttribute('aria-expanded', String(open));
  });
  document.addEventListener('keydown', event => {
    if ((event.key === 'Enter' || event.key === ' ') && event.target.matches('[role="button"][data-demo]')) {
      event.preventDefault(); notify(event.target.dataset.demo);
    }
    if (event.key === 'Escape') { document.body.classList.remove('sidebar-open'); document.getElementById('sidebar-toggle').setAttribute('aria-expanded','false'); }
  });
  const navigation = JSON.parse(document.getElementById('screen-navigation').textContent);
  const search = document.getElementById('screen-search');
  const go = () => {
    const value = search.value.trim().toLocaleLowerCase();
    const exact = navigation.find(item => item.title.toLocaleLowerCase() === value);
    if (exact) location.assign(exact.url);
  };
  search.addEventListener('change', go);
  search.addEventListener('keydown', event => { if (event.key === 'Enter') { event.preventDefault(); go(); } });
  // Image failure stays visible and accessible, with a local fallback.
  document.querySelectorAll('img').forEach(img => img.addEventListener('error', () => {
    if (!img.src.endsWith('/image-unavailable.svg')) img.src = '/assets/aqar/image-unavailable.svg';
  }, {once:true}));
})();
