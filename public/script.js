/* ============================================
   LA TORRE PIZZARIA - INTERACTIVE SCRIPTS
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {

    // ============================================
    // Intersection Observer for Scroll Animations
    // ============================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                // Re-trigger card animations when section comes into view
                const cards = entry.target.querySelectorAll('.menu-card');
                cards.forEach((card, index) => {
                    card.style.animationDelay = `${index * 0.08}s`;
                    card.classList.add('animate');
                });
            }
        });
    }, observerOptions);

    document.querySelectorAll('.menu-section, .info-banner').forEach(section => {
        scrollObserver.observe(section);
    });

    // ============================================
    // Navigation Pills - Active State
    // ============================================
    const navPills = document.querySelectorAll('.nav-pill');
    const sections = document.querySelectorAll('.menu-section');

    // Update active nav pill on scroll
    const navObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                navPills.forEach(pill => {
                    pill.classList.toggle('active', pill.dataset.category === id);
                });
            }
        });
    }, { threshold: 0.3, rootMargin: '-100px 0px -50% 0px' });

    sections.forEach(section => {
        navObserver.observe(section);
    });

    // Smooth scroll on pill click
    navPills.forEach(pill => {
        pill.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = pill.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ============================================
    // Card Hover Parallax Effect
    // ============================================
    const cards = document.querySelectorAll('.menu-card');

    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;

            card.style.transform = `translateY(-6px) perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });

    // ============================================
    // Sticky Navigation on Scroll
    // ============================================
    const menuNav = document.querySelector('.menu-nav');
    const hero = document.querySelector('.hero');
    let navSticky = false;

    const createStickyNav = () => {
        const stickyNav = document.createElement('div');
        stickyNav.className = 'sticky-nav';
        stickyNav.innerHTML = menuNav.innerHTML;
        document.body.appendChild(stickyNav);

        // Add click events to sticky nav pills
        stickyNav.querySelectorAll('.nav-pill').forEach(pill => {
            pill.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = pill.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        return stickyNav;
    };

    const stickyNav = createStickyNav();

    // Add sticky nav styles dynamically
    const stickyStyle = document.createElement('style');
    stickyStyle.textContent = `
        .sticky-nav {
            position: fixed;
            top: -70px;
            left: 0;
            right: 0;
            z-index: 900;
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
            padding: 12px 20px;
            background: rgba(62, 36, 21, 0.95);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            transition: top 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sticky-nav.visible {
            top: 0;
        }
        .sticky-nav .nav-pill {
            padding: 6px 16px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 600;
            color: rgba(255, 245, 220, 0.8);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
        }
        .sticky-nav .nav-pill:hover,
        .sticky-nav .nav-pill.active {
            background: rgba(31, 122, 63, 0.9);
            color: #fff;
            border-color: rgba(31, 122, 63, 0.5);
        }
        @media (max-width: 768px) {
            .sticky-nav {
                gap: 4px;
                padding: 8px 12px;
            }
            .sticky-nav .nav-pill {
                padding: 4px 10px;
                font-size: 0.75rem;
            }
        }
    `;
    document.head.appendChild(stickyStyle);

    // Show/hide sticky nav based on scroll
    const heroObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                stickyNav.classList.add('visible');
            } else {
                stickyNav.classList.remove('visible');
            }
        });
    }, { threshold: 0 });

    heroObserver.observe(hero);

    // Update sticky nav active state
    const updateStickyNavActive = () => {
        const stickyPills = stickyNav.querySelectorAll('.nav-pill');
        navPills.forEach((pill, index) => {
            if (pill.classList.contains('active') && stickyPills[index]) {
                stickyPills.forEach(sp => sp.classList.remove('active'));
                stickyPills[index].classList.add('active');
            }
        });
    };

    // Observe sections for sticky nav
    const stickyNavObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                const stickyPills = stickyNav.querySelectorAll('.nav-pill');
                stickyPills.forEach(pill => {
                    pill.classList.toggle('active', pill.dataset.category === id);
                });
            }
        });
    }, { threshold: 0.3, rootMargin: '-100px 0px -50% 0px' });

    sections.forEach(section => {
        stickyNavObserver.observe(section);
    });

    // ============================================
    // Counter Animation for Prices
    // ============================================
    const animatePrice = (element) => {
        const text = element.textContent;
        const match = text.match(/R\$\s*([\d,]+)/);
        if (!match) return;

        const targetValue = parseFloat(match[1].replace(',', '.'));
        const duration = 800;
        const start = performance.now();

        const animate = (currentTime) => {
            const elapsed = currentTime - start;
            const progress = Math.min(elapsed / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            const currentValue = (targetValue * eased).toFixed(2).replace('.', ',');
            element.textContent = `R$ ${currentValue}`;

            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        };

        requestAnimationFrame(animate);
    };

    // Animate prices when they come into view
    const priceObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animatePrice(entry.target);
                priceObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.card-price').forEach(price => {
        priceObserver.observe(price);
    });

    // ============================================
    // Scroll to top when clicking logo
    // ============================================
    const scrollIndicator = document.querySelector('.hero-scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', () => {
            const firstSection = document.querySelector('.menu-section');
            if (firstSection) {
                firstSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
        scrollIndicator.style.cursor = 'pointer';
    }

    // ============================================
    // Add subtle background particles
    // ============================================
    const createParticle = () => {
        const particle = document.createElement('div');
        const size = Math.random() * 6 + 2;
        const x = Math.random() * 100;
        const duration = Math.random() * 10 + 15;
        const delay = Math.random() * 10;

        particle.style.cssText = `
            position: fixed;
            width: ${size}px;
            height: ${size}px;
            background: rgba(232, 184, 48, ${Math.random() * 0.15 + 0.05});
            border-radius: 50%;
            left: ${x}%;
            top: 100%;
            z-index: -1;
            pointer-events: none;
            animation: particle-float ${duration}s ${delay}s linear infinite;
        `;

        document.body.appendChild(particle);
    };

    // Add particle animation style
    const particleStyle = document.createElement('style');
    particleStyle.textContent = `
        @keyframes particle-float {
            0% { transform: translateY(0) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-110vh) rotate(720deg); opacity: 0; }
        }
    `;
    document.head.appendChild(particleStyle);

    // Create a few particles
    for (let i = 0; i < 8; i++) {
        createParticle();
    }

});
