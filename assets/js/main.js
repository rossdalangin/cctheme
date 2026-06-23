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
    if (header) {
        const updateHeader = () => {
            if (window.scrollY > 50) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }
        };
        window.addEventListener('scroll', updateHeader);
        updateHeader();
    }

    // --- Reveal Animation System (Intersection Observer) ---
    const revealElements = document.querySelectorAll('.reveal, .reveal-stagger');
    if (revealElements.length > 0) {
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
    }

    // --- Mobile Menu Toggle ---
    const toggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.main-navigation');

    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            nav.classList.toggle('is-open');
            const expanded = toggle.getAttribute('aria-expanded') === 'true' || false;
            toggle.setAttribute('aria-expanded', !expanded);
            document.body.style.overflow = nav.classList.contains('is-open') ? 'hidden' : '';

            // Staggered reveal for menu links
            const menuLinks = nav.querySelectorAll('.primary-menu-list li');
            if (nav.classList.contains('is-open')) {
                menuLinks.forEach((link, index) => {
                    link.style.opacity = '0';
                    link.style.transform = 'translateY(20px)';
                    link.style.transition = `all 0.4s cubic-bezier(0.16, 1, 0.3, 1) ${0.2 + (index * 0.1)}s`;
                    setTimeout(() => {
                        link.style.opacity = '1';
                        link.style.transform = 'translateY(0)';
                    }, 50);
                });
            } else {
                menuLinks.forEach(link => {
                    link.style.opacity = '';
                    link.style.transform = '';
                    link.style.transition = '';
                });
            }
        });
    }

    // --- Reading Progress Bar ---
    const progressBar = document.querySelector('.reading-progress-bar');
    if (progressBar) {
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            if (height > 0) {
                const scrolled = (winScroll / height) * 100;
                progressBar.style.width = scrolled + "%";
            }
        });
    }

    // --- Card Glow Mouse Tracking ---
    const cards = document.querySelectorAll('.cc-card');
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    });

    // --- Custom Cursor Logic ---
    const cursor = document.createElement('div');
    cursor.className = 'cc-cursor';
    document.body.appendChild(cursor);

    let mouseX = 0, mouseY = 0;
    let cursorX = 0, cursorY = 0;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        cursor.style.opacity = '1';
    });

    const animateCursor = () => {
        cursorX += (mouseX - cursorX) * 0.15;
        cursorY += (mouseY - cursorY) * 0.15;
        cursor.style.transform = `translate3d(${cursorX - 10}px, ${cursorY - 10}px, 0)`;
        requestAnimationFrame(animateCursor);
    };
    animateCursor();

    document.querySelectorAll('a, button, .cc-card, .social-icon').forEach(el => {
        el.addEventListener('mouseenter', () => cursor.classList.add('is-active'));
        el.addEventListener('mouseleave', () => cursor.classList.remove('is-active'));
    });

    // --- Premium Magnetic Effect with Hardware Acceleration ---
    const magneticButtons = document.querySelectorAll('.cc-button, .social-icon, .cc-card');
    magneticButtons.forEach(btn => {
        btn.addEventListener('mousemove', (e) => {
            const position = btn.getBoundingClientRect();
            const strength = btn.classList.contains('cc-card') ? 0.05 : 0.25;
            const x = (e.clientX - position.left - position.width / 2) * strength;
            const y = (e.clientY - position.top - position.height / 2) * strength;

            btn.style.transform = `translate3d(${x}px, ${y}px, 0)`;
            btn.style.transition = 'none';
            btn.style.zIndex = '10';
        });

        btn.addEventListener('mouseleave', () => {
            btn.style.transition = 'transform 1s cubic-bezier(0.19, 1, 0.22, 1)';
            btn.style.transform = 'translate3d(0, 0, 0)';
            btn.style.zIndex = '';
        });
    });

    // --- Stats Counter Animation ---
    const stats = document.querySelectorAll('.stat-value');
    if (stats.length > 0) {
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
    }

    // --- Typewriter Effect ---
    const typewriterElement = document.querySelector('.typewriter-text');
    if (typewriterElement) {
        const text = typewriterElement.getAttribute('data-text');
        if (text) {
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
    }

    // --- Authority Audit Modal Logic ---
    const modal = document.querySelector('#audit-modal');
    const closeBtn = document.querySelector('.cc-modal-close');
    const overlay = document.querySelector('.cc-modal-overlay');

    const openModal = (e) => {
        if (e && e.preventDefault) e.preventDefault();
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    };

    const closeModal = () => {
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    };

    document.querySelectorAll('a[href="#audit"]').forEach(btn => {
        btn.addEventListener('click', openModal);
    });

    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (overlay) overlay.addEventListener('click', closeModal);

    // --- FAQ Accordion Logic ---
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const header = item.querySelector('.faq-header');

        if (header) {
            header.addEventListener('click', () => {
                const isActive = item.classList.contains('active');

                // Close other items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                        otherItem.querySelector('.faq-header').setAttribute('aria-expanded', 'false');
                    }
                });

                // Toggle current item
                if (isActive) {
                    item.classList.remove('active');
                    header.setAttribute('aria-expanded', 'false');
                } else {
                    item.classList.add('active');
                    header.setAttribute('aria-expanded', 'true');
                }
            });
        }
    });

    // --- Exit Intent Logic ---
    let exitIntentFired = false;
    document.addEventListener('mouseleave', (e) => {
        if (e.clientY <= 0 && !exitIntentFired) {
            openModal();
            exitIntentFired = true;
        }
    });

    // --- Floating CTA Interaction ---
    const floatingCta = document.querySelector('.floating-cta');
    if (floatingCta) {
        const threshold = (typeof closeclientData !== 'undefined' && closeclientData.ctaThreshold) ? parseInt(closeclientData.ctaThreshold) : 500;
        window.addEventListener('scroll', () => {
            if (window.scrollY > threshold) {
                floatingCta.classList.add('is-visible');
            } else {
                floatingCta.classList.remove('is-visible');
            }
        });
    }
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
