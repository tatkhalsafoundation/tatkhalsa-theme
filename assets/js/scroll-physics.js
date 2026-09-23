/**
 * Tatkhalsa Foundation Pro Max - Frontend UI Engine
 * Pure Vanilla JavaScript | Crash-Proof Defensive Architecture
 *
 * @version 1.3.0
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    console.log('Tatkhalsa UI Engine Loaded Successfully');

    /* ==========================================================================
       1. CLEAN HAMBURGER & OFF-CANVAS DRAWER CONTROLLER
       ========================================================================== */
    var hamburger = document.querySelector('.tk-hamburger');
    var drawer = document.querySelector('.tk-drawer');
    var overlay = document.querySelector('.tk-drawer-overlay');
    var closeBtn = document.querySelector('.tk-drawer-close');
    var drawerLinks = document.querySelectorAll('.tk-drawer-link, .tk-drawer-phone, .tk-btn-blood-drawer');

    function openDrawer() {
        if (hamburger) {
            hamburger.classList.add('is-open', 'active');
            hamburger.setAttribute('aria-expanded', 'true');
        }
        if (drawer) {
            drawer.classList.add('is-open', 'active');
            drawer.removeAttribute('inert');
            drawer.setAttribute('aria-hidden', 'false');
        }
        if (overlay) {
            overlay.classList.add('is-open', 'active');
            overlay.setAttribute('aria-hidden', 'false');
        }
        document.body.classList.add('tk-scroll-locked');
    }

    function closeDrawer() {
        if (hamburger) {
            hamburger.classList.remove('is-open', 'active');
            hamburger.setAttribute('aria-expanded', 'false');
        }
        if (drawer) {
            drawer.classList.remove('is-open', 'active');
            drawer.setAttribute('inert', '');
            drawer.setAttribute('aria-hidden', 'true');
        }
        if (overlay) {
            overlay.classList.remove('is-open', 'active');
            overlay.setAttribute('aria-hidden', 'true');
        }
        document.body.classList.remove('tk-scroll-locked');
    }

    function toggleDrawer() {
        if (drawer && (drawer.classList.contains('is-open') || drawer.classList.contains('active'))) {
            closeDrawer();
        } else {
            openDrawer();
        }
    }

    if (hamburger) {
        hamburger.addEventListener('click', function(e) {
            e.preventDefault();
            toggleDrawer();
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            closeDrawer();
        });
    }

    if (overlay) {
        overlay.addEventListener('click', function(e) {
            e.preventDefault();
            closeDrawer();
        });
    }

    if (drawerLinks && drawerLinks.length > 0) {
        drawerLinks.forEach(function(link) {
            if (link) {
                link.addEventListener('click', function() {
                    closeDrawer();
                });
            }
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (drawer && (drawer.classList.contains('is-open') || drawer.classList.contains('active'))) {
                closeDrawer();
            }
        }
    });

    /* ==========================================================================
       2. RELIABLE SCROLL-DRIVEN LOGO PHYSICS & BODY STATE
       ========================================================================== */
    var header = document.querySelector('.tk-header');
    var isTicking = false;

    function handleScroll() {
        var scrollY = window.scrollY || window.pageYOffset || 0;

        if (scrollY > 50) {
            if (!document.body.classList.contains('scrolled')) {
                document.body.classList.add('scrolled');
            }
            if (header && !header.classList.contains('scrolled')) {
                header.classList.add('scrolled');
            }
        } else {
            if (document.body.classList.contains('scrolled')) {
                document.body.classList.remove('scrolled');
            }
            if (header && header.classList.contains('scrolled')) {
                header.classList.remove('scrolled');
            }
        }
        isTicking = false;
    }

    window.addEventListener('scroll', function() {
        if (!isTicking) {
            window.requestAnimationFrame(handleScroll);
            isTicking = true;
        }
    }, { passive: true });

    // Initial check on page load
    handleScroll();

    /* ==========================================================================
       3. TELEMETRY STATS COUNTER ANIMATION
       ========================================================================== */
    var telemetrySection = document.querySelector('.tk-telemetry-strip');
    var counters = document.querySelectorAll('.tk-stat-num[data-target]');
    var animated = false;

    if (telemetrySection && counters.length > 0 && 'IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !animated) {
                    animated = true;
                    counters.forEach(function(counter) {
                        var target = parseInt(counter.getAttribute('data-target'), 10);
                        if (isNaN(target)) return;
                        var duration = 1600;
                        var start = 0;
                        var startTime = null;

                        function step(timestamp) {
                            if (!startTime) startTime = timestamp;
                            var progress = Math.min((timestamp - startTime) / duration, 1);
                            var easeOut = 1 - Math.pow(1 - progress, 3);
                            var current = Math.floor(easeOut * target);
                            counter.innerText = current.toLocaleString('en-IN');
                            if (progress < 1) {
                                window.requestAnimationFrame(step);
                            } else {
                                counter.innerText = target.toLocaleString('en-IN');
                            }
                        }
                        window.requestAnimationFrame(step);
                    });
                }
            });
        }, { threshold: 0.2 });

        observer.observe(telemetrySection);
    }

    /* ==========================================================================
       4. BACK TO TOP BUTTON
       ========================================================================== */
    var backToTop = document.querySelector('.tk-back-to-top');
    if (backToTop) {
        window.addEventListener('scroll', function() {
            var scrollY = window.scrollY || window.pageYOffset || 0;
            if (scrollY > 400) {
                backToTop.classList.add('is-visible');
            } else {
                backToTop.classList.remove('is-visible');
            }
        }, { passive: true });

        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /* ==========================================================================
       5. SMOOTH ANCHOR SCROLLING (DEFENSIVE)
       ========================================================================== */
    var anchorLinks = document.querySelectorAll('a[href^="#"]:not([href="#"])');
    if (anchorLinks && anchorLinks.length > 0) {
        anchorLinks.forEach(function(anchor) {
            if (anchor) {
                anchor.addEventListener('click', function(e) {
                    var targetId = this.getAttribute('href');
                    if (targetId && targetId.length > 1) {
                        var targetElement = document.querySelector(targetId);
                        if (targetElement) {
                            e.preventDefault();
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }
                });
            }
        });
    }
});
