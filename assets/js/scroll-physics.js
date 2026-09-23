/**
 * Tatkhalsa Pro Max - Scroll Physics, Off-Canvas Drawer & Motion Engine
 *
 * @package TatkhalsaTheme
 * @version 1.1.0
 */

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        initOffCanvasDrawer();
        initCenterToHeaderLogoAnimation();
        initTelemetryCounters();
    });

    /**
     * 1. ACCESSIBLE OFF-CANVAS DRAWER CONTROLLER
     */
    function initOffCanvasDrawer() {
        const hamburger = document.getElementById('tk-hamburger');
        const drawer = document.getElementById('tk-drawer');
        const overlay = document.getElementById('tk-drawer-overlay');
        const closeBtn = document.getElementById('tk-drawer-close');
        const drawerLinks = drawer ? drawer.querySelectorAll('.tk-drawer-link, .tk-btn-blood-drawer') : [];

        if (!hamburger || !drawer || !overlay) return;

        let lastActiveElement = null;

        function openDrawer() {
            lastActiveElement = document.activeElement;

            drawer.classList.add('active');
            overlay.classList.add('active');
            hamburger.classList.add('active');

            drawer.removeAttribute('inert');
            drawer.setAttribute('aria-hidden', 'false');
            overlay.setAttribute('aria-hidden', 'false');
            hamburger.setAttribute('aria-expanded', 'true');

            document.body.classList.add('tk-scroll-locked');

            setTimeout(() => {
                if (closeBtn) closeBtn.focus();
            }, 100);

            document.addEventListener('keydown', handleKeyDown);
        }

        function closeDrawer() {
            drawer.classList.remove('active');
            overlay.classList.remove('active');
            hamburger.classList.remove('active');

            drawer.setAttribute('inert', '');
            drawer.setAttribute('aria-hidden', 'true');
            overlay.setAttribute('aria-hidden', 'true');
            hamburger.setAttribute('aria-expanded', 'false');

            document.body.classList.remove('tk-scroll-locked');
            document.removeEventListener('keydown', handleKeyDown);

            if (lastActiveElement && typeof lastActiveElement.focus === 'function') {
                lastActiveElement.focus();
            }
        }

        function toggleDrawer() {
            const isOpen = drawer.classList.contains('active');
            if (isOpen) {
                closeDrawer();
            } else {
                openDrawer();
            }
        }

        function handleKeyDown(e) {
            if (e.key === 'Escape') {
                e.preventDefault();
                closeDrawer();
                return;
            }

            if (e.key === 'Tab') {
                const focusable = drawer.querySelectorAll(
                    'a[href], button:not([disabled]), input:not([disabled]), [tabindex]:not([tabindex="-1"])'
                );
                if (focusable.length === 0) return;

                const firstElement = focusable[0];
                const lastElement = focusable[focusable.length - 1];

                if (e.shiftKey && document.activeElement === firstElement) {
                    e.preventDefault();
                    lastElement.focus();
                } else if (!e.shiftKey && document.activeElement === lastElement) {
                    e.preventDefault();
                    firstElement.focus();
                }
            }
        }

        hamburger.addEventListener('click', toggleDrawer);
        overlay.addEventListener('click', closeDrawer);
        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);

        drawerLinks.forEach(link => {
            link.addEventListener('click', () => {
                closeDrawer();
            });
        });
    }

    /**
     * 2. CENTER-TO-HEADER LOGO ANIMATION (FLIGHT DOCK ENGINE)
     */
    function initCenterToHeaderLogoAnimation() {
        const header = document.getElementById('tk-header');
        const heroEmblem = document.getElementById('heroEmblem');
        const navDock = document.getElementById('tkNavLogoDock');
        const headerLogoImg = document.getElementById('tkHeaderLogoImg');

        if (!heroEmblem || !header) return;

        let isTicking = false;
        let isDocked = false;

        function updateFlight() {
            const scrollY = window.pageYOffset || document.documentElement.scrollTop;
            const threshold = 50;

            // Toggle header scrolled state
            if (scrollY > 30) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            if (scrollY <= 0) {
                // Resting hero state
                heroEmblem.style.transform = 'translate3d(0, 0, 0) scale(1)';
                heroEmblem.style.opacity = '1';
                heroEmblem.style.visibility = 'visible';
                if (headerLogoImg) headerLogoImg.classList.remove('is-docked');
                isDocked = false;
            } else if (scrollY >= threshold + 140) {
                // Fully docked state
                if (!isDocked) {
                    heroEmblem.style.opacity = '0';
                    heroEmblem.style.visibility = 'hidden';
                    if (headerLogoImg) headerLogoImg.classList.add('is-docked');
                    isDocked = true;
                }
            } else if (scrollY > threshold) {
                // Transition flight state
                if (navDock) {
                    const heroRect = heroEmblem.getBoundingClientRect();
                    const dockRect = navDock.getBoundingClientRect();

                    const deltaX = dockRect.left + (dockRect.width / 2) - (heroRect.left + (heroRect.width / 2));
                    const deltaY = dockRect.top + (dockRect.height / 2) - (heroRect.top + (heroRect.height / 2));
                    const progress = Math.min((scrollY - threshold) / 140, 1);
                    const ease = 1 - Math.pow(1 - progress, 3);

                    const curX = deltaX * ease;
                    const curY = deltaY * ease;
                    const curScale = 1 - (1 - (44 / 116)) * ease;

                    heroEmblem.style.transform = `translate3d(${curX.toFixed(2)}px, ${curY.toFixed(2)}px, 0) scale(${curScale.toFixed(4)})`;
                    heroEmblem.style.opacity = (1 - progress * 0.4).toFixed(3);
                    heroEmblem.style.visibility = 'visible';
                }

                if (headerLogoImg) headerLogoImg.classList.remove('is-docked');
                isDocked = false;
            } else {
                // Scrolling 0-60px
                heroEmblem.style.transform = 'translate3d(0, 0, 0) scale(1)';
                heroEmblem.style.opacity = '1';
                heroEmblem.style.visibility = 'visible';
                if (headerLogoImg) headerLogoImg.classList.remove('is-docked');
                isDocked = false;
            }

            isTicking = false;
        }

        window.addEventListener('scroll', function () {
            if (!isTicking) {
                window.requestAnimationFrame(updateFlight);
                isTicking = true;
            }
        }, { passive: true });

        window.addEventListener('resize', updateFlight);
        updateFlight();
    }

    /**
     * 3. TELEMETRY STATS COUNTER
     */
    function initTelemetryCounters() {
        const counters = document.querySelectorAll('.tk-counter');
        if (!counters.length) return;

        let animated = false;

        function runCounters() {
            if (animated) return;
            animated = true;

            counters.forEach((counter) => {
                const target = parseInt(counter.getAttribute('data-target'), 10) || 0;
                const prefix = counter.getAttribute('data-prefix') || '';
                const suffix = counter.getAttribute('data-suffix') || '+';
                const duration = 1800;
                const startTime = performance.now();

                function update(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const ease = 1 - Math.pow(1 - progress, 3);
                    const current = Math.floor(ease * target);

                    counter.textContent = prefix + current.toLocaleString() + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(update);
                    } else {
                        counter.textContent = prefix + target.toLocaleString() + suffix;
                    }
                }

                requestAnimationFrame(update);
            });
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    runCounters();
                    observer.disconnect();
                }
            });
        }, { threshold: 0.3 });

        const el = document.getElementById('telemetry-counters');
        if (el) observer.observe(el);
    }

})();
