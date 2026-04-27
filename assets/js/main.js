/**
 * CloseClient Main Interactions
 * Luxury Minimalist Edition.
 */

document.addEventListener('DOMContentLoaded', () => {

    // Header Scroll State
    const header = document.getElementById('masthead');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    });

    // Scroll Reveal System
    const revealElements = document.querySelectorAll('.reveal');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(el => {
        revealObserver.observe(el);
    });

    // Reading Progress Bar
    const progressBar = document.createElement('div');
    progressBar.className = 'reading-progress-bar';
    document.body.appendChild(progressBar);

    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        progressBar.style.width = scrolled + "%";
    });

    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNav = document.getElementById('site-navigation');

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            siteNav.classList.toggle('is-open');
            const isOpen = siteNav.classList.contains('is-open');
            menuToggle.setAttribute('aria-expanded', isOpen);
            document.body.style.overflow = isOpen ? 'hidden' : '';
        });
    }

});

/* Header Scroll Effect */
window.addEventListener('scroll', () => {
    const header = document.querySelector('.site-header');
    if (window.scrollY > 50) {
        header.classList.add('is-scrolled');
    } else {
        header.classList.remove('is-scrolled');
    }
});

/* Mobile Menu Interaction Improvement */
const toggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('.main-navigation');

if (toggle) {
    toggle.addEventListener('click', () => {
        nav.classList.toggle('is-open');
        const expanded = toggle.getAttribute('aria-expanded') === 'true' || false;
        toggle.setAttribute('aria-expanded', !expanded);
    });
}
