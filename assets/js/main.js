/**
 * CloseClient Main Interactions
 */

document.addEventListener('DOMContentLoaded', () => {

    // --- Smooth Scrolling for Anchor Links ---
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });

    // --- Header Scroll Effect ---
    const header = document.querySelector('.site-header');
    const updateHeader = () => {
        if (window.scrollY > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    };
    window.addEventListener('scroll', updateHeader);
    updateHeader();

    // --- Reveal Animation System (Intersection Observer) ---
    const revealElements = document.querySelectorAll('.reveal');
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

    revealElements.forEach(el => revealObserver.observe(el));

    // --- Mobile Menu Toggle ---
    const toggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.main-navigation');

    if (toggle) {
        toggle.addEventListener('click', () => {
            nav.classList.toggle('is-open');
            const expanded = toggle.getAttribute('aria-expanded') === 'true' || false;
            toggle.setAttribute('aria-expanded', !expanded);
            document.body.style.overflow = nav.classList.contains('is-open') ? 'hidden' : '';
        });
    }

    // --- Reading Progress Bar ---
    const progressBar = document.createElement('div');
    progressBar.className = 'reading-progress-bar';
    document.body.appendChild(progressBar);

    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        progressBar.style.width = scrolled + "%";
    });

    // --- Premium Magnetic Effect with Hardware Acceleration ---
    const magneticButtons = document.querySelectorAll('.cc-button:not(.cc-button-secondary), .social-icon');
    magneticButtons.forEach(btn => {
        btn.addEventListener('mousemove', (e) => {
            const position = btn.getBoundingClientRect();
            const x = (e.clientX - position.left - position.width / 2) * 0.25;
            const y = (e.clientY - position.top - position.height / 2) * 0.25;

            btn.style.transform = `translate3d(${x}px, ${y}px, 0)`;
            btn.style.transition = 'none';
            btn.style.zIndex = '10';
        });

        btn.addEventListener('mouseleave', () => {
            btn.style.transition = 'transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
            btn.style.transform = 'translate3d(0, 0, 0)';
            btn.style.zIndex = '';
        });
    });
});

/* Preloader Execution */
window.addEventListener('load', () => {
    const preloader = document.querySelector('.cc-preloader');
    if (preloader) {
        setTimeout(() => {
            preloader.classList.add('fade-out');
        }, 500);
    }
});

/* Stats Counter Animation */
const stats = document.querySelectorAll('.stat-value');
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const target = entry.target;
            const count = parseInt(target.innerText.replace(/\D/g, ''));
            const suffix = target.innerText.replace(/[0-9]/g, '');
            let current = 0;
            const increment = count / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= count) {
                    target.innerText = count + suffix;
                    clearInterval(timer);
                } else {
                    target.innerText = Math.floor(current) + suffix;
                }
            }, 30);
            statsObserver.unobserve(target);
        }
    });
}, { threshold: 0.5 });
stats.forEach(s => statsObserver.observe(s));

/* Typewriter Effect */
const typewriterElement = document.querySelector('.typewriter-text');
if (typewriterElement) {
    const text = typewriterElement.getAttribute('data-text');
    let i = 0;
    const speed = 100;
    const type = () => {
        if (i < text.length) {
            typewriterElement.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    };
    type();
}

/* Authority Audit Modal Logic */
const modal = document.querySelector('#audit-modal');
const closeBtn = document.querySelector('.cc-modal-close');
const overlay = document.querySelector('.cc-modal-overlay');

const openModal = (e) => {
    if (e) e.preventDefault();
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
};

const closeModal = () => {
    modal.classList.remove('active');
    document.body.style.overflow = '';
};

document.querySelectorAll('a[href="#audit"]').forEach(btn => {
    btn.addEventListener('click', openModal);
});

if (closeBtn) closeBtn.addEventListener('click', closeModal);
if (overlay) overlay.addEventListener('click', closeModal);

/* Exit Intent Logic */
let exitIntentFired = false;
document.addEventListener('mouseleave', (e) => {
    if (e.clientY <= 0 && !exitIntentFired) {
        openModal();
        exitIntentFired = true;
        console.log('Exit intent triggered');
    }
});

/* Floating CTA Interaction */
const floatingCta = document.querySelector('.floating-cta');
if (floatingCta) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 500) {
            floatingCta.classList.add('is-visible');
        } else {
            floatingCta.classList.remove('is-visible');
        }
    });
}
