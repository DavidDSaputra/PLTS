

// Import Alpine.js
import Alpine from 'alpinejs';

// Import AOS
import AOS from 'aos';

// Import Lenis
import Lenis from 'lenis';

// Import GSAP
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

window.Alpine = Alpine;
Alpine.start();

// Initialize GSAP
gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {
    // Initialize AOS
    AOS.init({
        once: true,
        offset: 70,
        duration: 900,
        easing: 'ease-out-cubic',
    });

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const lenis = prefersReducedMotion
        ? null
        : new Lenis({
            duration: 1.05,
            lerp: 0.1,
            smoothWheel: true,
            wheelMultiplier: 0.9,
            touchMultiplier: 1,
            infinite: false,
        });

    if (lenis) {
        lenis.on('scroll', ScrollTrigger.update);

        const lenisRaf = (time) => {
            lenis.raf(time);
            window.requestAnimationFrame(lenisRaf);
        };

        window.requestAnimationFrame(lenisRaf);
    }

    document.querySelectorAll('a[href^="#"], a[href^="/#"]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const url = new URL(link.getAttribute('href'), window.location.origin);

            if (url.pathname !== window.location.pathname || !url.hash) {
                return;
            }

            const target = document.querySelector(url.hash);

            if (!target) {
                return;
            }

            event.preventDefault();

            const headerOffset = 96;

            window.history.pushState(null, '', url.hash);

            if (lenis) {
                lenis.scrollTo(target, {
                    offset: -headerOffset,
                    duration: 1,
                });
            } else {
                const targetY = target.getBoundingClientRect().top + window.scrollY - headerOffset;
                window.scrollTo({
                    top: Math.max(targetY, 0),
                    behavior: 'smooth',
                });
            }
        });
    });

    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroTitle = document.querySelector('.hero-title');
    const heroDots = document.querySelectorAll('[data-hero-slide-button]');
    const heroPrev = document.querySelector('[data-hero-prev]');
    const heroNext = document.querySelector('[data-hero-next]');
    const heroTitles = Array.from(heroSlides).map((slide) => slide.dataset.title);

    if (heroSlides.length && heroTitle) {
        let activeSlide = 0;
        let heroInterval;

        gsap.fromTo(heroTitle, { y: 44, opacity: 0 }, { y: 0, opacity: 1, duration: 1, ease: 'power3.out' });

        const setHeroSlide = (index) => {
            if (index === activeSlide) {
                return;
            }

            heroSlides[activeSlide].classList.remove('is-active');
            heroDots[activeSlide]?.classList.remove('is-active');

            activeSlide = (index + heroSlides.length) % heroSlides.length;

            heroSlides[activeSlide].classList.add('is-active');
            heroDots[activeSlide]?.classList.add('is-active');

            gsap.to(heroTitle, {
                y: -16,
                opacity: 0,
                duration: 0.28,
                ease: 'power2.in',
                onComplete: () => {
                    heroTitle.textContent = heroTitles[activeSlide];
                    gsap.fromTo(heroTitle, { y: 24, opacity: 0 }, { y: 0, opacity: 1, duration: 0.55, ease: 'power3.out' });
                },
            });
        };

        const restartHeroInterval = () => {
            window.clearInterval(heroInterval);
            heroInterval = window.setInterval(() => {
                setHeroSlide(activeSlide + 1);
            }, 5200);
        };

        heroDots.forEach((dot) => {
            dot.addEventListener('click', () => {
                setHeroSlide(Number(dot.dataset.heroSlideButton));
                restartHeroInterval();
            });
        });

        heroPrev?.addEventListener('click', () => {
            setHeroSlide(activeSlide - 1);
            restartHeroInterval();
        });

        heroNext?.addEventListener('click', () => {
            setHeroSlide(activeSlide + 1);
            restartHeroInterval();
        });

        restartHeroInterval();
    }

    // Number Counter Animation
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        
        ScrollTrigger.create({
            trigger: counter,
            start: "top 85%",
            once: true,
            onEnter: () => {
                gsap.to(counter, {
                    innerHTML: target,
                    duration: 2,
                    snap: { innerHTML: 1 },
                    ease: "power1.out",
                    onUpdate: function() {
                        counter.innerHTML = Math.round(counter.innerHTML);
                    }
                });
            }
        });
    });

    gsap.utils.toArray('.parallax-image').forEach((image, index) => {
        gsap.to(image, {
            yPercent: index % 2 === 0 ? -8 : 8,
            ease: 'none',
            scrollTrigger: {
                trigger: image,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true,
            },
        });
    });

    gsap.utils.toArray('article.group').forEach((card) => {
        gsap.fromTo(card, { y: 22 }, {
            y: 0,
            duration: 0.8,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: card,
                start: 'top 88%',
                once: true,
            },
        });
    });
});
