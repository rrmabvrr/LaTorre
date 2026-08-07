import './bootstrap';

document.addEventListener('click', (event) => {
    const link = event.target.closest('[data-smooth-scroll]');

    if (!link) {
        return;
    }

    const hash = link.getAttribute('href');

    if (!hash || !hash.startsWith('#')) {
        return;
    }

    const target = document.querySelector(hash);

    if (!target) {
        return;
    }

    event.preventDefault();

    const offset = 145;
    const top = target.getBoundingClientRect().top + window.scrollY - offset;

    window.scrollTo({ top, behavior: 'smooth' });
});
