/**
 * CloseClient Main Interactions
 * Advanced scroll reveals and UI feedback.
 */

document.addEventListener('DOMContentLoaded', () => {

    // Header Scroll State
    const header = document.getElementById('masthead');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    });

    // Mobile Menu Logic
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNav = document.getElementById('site-navigation');

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            const isOpen = siteNav.classList.contains('is-open');
            siteNav.classList.toggle('is-open');
            menuToggle.setAttribute('aria-expanded', !isOpen);
            document.body.style.overflow = isOpen ? '' : 'hidden';
        });
    }

    // Scroll Reveal System
    const revealElements = document.querySelectorAll('.section-hero, .bento-item, .pricing-card, .testimonial-card, .service-card');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(el => {
        el.classList.add('reveal');
        revealObserver.observe(el);
    });

    // Reading Progress
    const progressBar = document.createElement('div');
    progressBar.className = 'reading-progress-bar';
    document.body.appendChild(progressBar);

    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        progressBar.style.width = scrolled + "%";
    });

});
