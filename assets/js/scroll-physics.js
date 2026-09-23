/**
 * Tatkhalsa Pro Max - Scroll Physics & GSAP Motion Engine
 *
 * Handles Lenis smooth scrolling, GSAP ScrollTrigger orchestration,
 * center-to-left sticky header logo docking morph, bento card reveals,
 * and dynamic telemetry counter animations.
 *
 * @package TatkhalsaTheme
 * @version 1.0.0
 */

(function () {
    'use strict';

    // Wait until DOM is ready
    document.addEventListener('DOMContentLoaded', function () {
        initLenisAndGSAP();
    });

    function initLenisAndGSAP() {
        // 1. Initialize Lenis Smooth Scroll
        let lenis = null;
        if (typeof Lenis !== 'undefined') {
            lenis = new Lenis({
                duration: 1.2,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                direction: 'vertical',
                gestureDirection: 'vertical',
                smooth: true,
                mouseMultiplier: 1,
                smoothTouch: false,
                touchMultiplier: 2,
                infinite: false,
            });

            // Connect Lenis to GSAP ScrollTrigger if available
            if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);
                lenis.on('scroll', ScrollTrigger.update);

                gsap.ticker.add((time) => {
                    lenis.raf(time * 1000);
                });

                gsap.ticker.lagSmoothing(0);
            } else {
                function raf(time) {
                    lenis.raf(time);
                    requestAnimationFrame(raf);
                }
                requestAnimationFrame(raf);
            }
        }

        // 2. Center-to-Left Logo Sticky Header Animation with GSAP & ScrollTrigger
        initLogoMorphAndHeader();

        // 3. Bento Grid Cards Stagger Reveal
        initBentoScrollAnimations();

        // 4. Telemetry Counter Scroll Trigger
        initTelemetryCounters();
    }

    /**
     * Center Hero Logo to Left Sticky Header Docking Animation
     */
    function initLogoMorphAndHeader() {
        const header = document.getElementById('masthead');
        const heroLogo = document.getElementById('tk-center-hero-logo');
        const navSlot = document.getElementById('tk-navbar-logo-slot');
        const heroStage = document.getElementById('hero-stage');

        if (!header || !heroLogo || !heroStage) {
            return;
        }

        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            // ScrollTrigger for sticky header state
            ScrollTrigger.create({
                trigger: '#hero-stage',
                start: 'top top',
                end: 'bottom 120px',
                onUpdate: (self) => {
                    if (self.progress > 0.15) {
                        header.classList.add('is-sticky');
                    } else {
                        header.classList.remove('is-sticky');
                    }
                }
            });

            // Center-to-Left Logo Morph Transition
            const logoTimeline = gsap.timeline({
                scrollTrigger: {
                    trigger: '#hero-stage',
                    start: 'top top',
                    end: 'bottom 200px',
                    scrub: 0.8,
                }
            });

            // Smoothly scale down hero logo and fade toward docking slot
            logoTimeline.to(heroLogo, {
                scale: 0.45,
                opacity: 0,
                y: -60,
                ease: 'power2.inOut'
            });

            if (navSlot) {
                // Fade in sticky nav logo as hero logo disappears
                gsap.set(navSlot, { opacity: 0, scale: 0.7, x: -15 });
                gsap.to(navSlot, {
                    scrollTrigger: {
                        trigger: '#hero-stage',
                        start: 'center top',
                        end: 'bottom top',
                        scrub: 0.5,
                    },
                    opacity: 1,
                    scale: 1,
                    x: 0,
                    ease: 'power1.out'
                });
            }

        } else {
            // Fallback for when GSAP is offline
            window.addEventListener('scroll', function () {
                if (window.scrollY > 120) {
                    header.classList.add('is-sticky');
                    if (navSlot) navSlot.style.opacity = '1';
                } else {
                    header.classList.remove('is-sticky');
                    if (navSlot) navSlot.style.opacity = '0';
                }
            }, { passive: true });
        }
    }

    /**
     * Staggered Bento Grid Card Reveal on Scroll
     */
    function initBentoScrollAnimations() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            return;
        }

        const cards = gsap.utils.toArray('.tk-bento-card');
        if (!cards.length) return;

        ScrollTrigger.batch(cards, {
            start: 'top 85%',
            once: true,
            onEnter: (batch) => {
                gsap.fromTo(batch, {
                    opacity: 0,
                    y: 40,
                    scale: 0.98
                }, {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.8,
                    stagger: 0.15,
                    ease: 'power3.out'
                });
            }
        });
    }

    /**
     * Dynamic Telemetry Animated Counters
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
                const duration = 2000;
                const start = 0;
                const startTime = performance.now();

                function updateCounter(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    // Ease out expo
                    const easeProgress = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                    const currentCount = Math.floor(easeProgress * (target - start) + start);

                    counter.textContent = prefix + currentCount.toLocaleString() + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = prefix + target.toLocaleString() + suffix;
                    }
                }

                requestAnimationFrame(updateCounter);
            });
        }

        if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.create({
                trigger: '#telemetry-counters',
                start: 'top 90%',
                once: true,
                onEnter: runCounters
            });
        } else {
            // Fallback IntersectionObserver
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runCounters();
                        observer.disconnect();
                    }
                });
            }, { threshold: 0.5 });

            const el = document.getElementById('telemetry-counters');
            if (el) observer.observe(el);
        }
    }

})();
