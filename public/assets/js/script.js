/* ===========================================================
   SORA — Restaurant & Cafe — Main Script
   GSAP page-load + scroll animations, AOS init, Swiper sliders,
   menu filtering, magnetic buttons, custom cursor, forms, etc.
=========================================================== */

document.addEventListener('DOMContentLoaded', () => {

  /* ---------------------------------------------------------
     0. SET FOOTER YEAR
  --------------------------------------------------------- */
  const yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  /* ---------------------------------------------------------
     1. LOADING SCREEN
  --------------------------------------------------------- */
  const loader = document.getElementById('loader');
  const loaderBarSpan = loader ? loader.querySelector('.loader-bar span') : null;
  let hasEnteredHero = false;

  function revealSiteAndAnimateHero() {
    if (hasEnteredHero) return;
    hasEnteredHero = true;
    if (loader) loader.classList.add('is-hidden');
    runHeroEntrance();
    document.body.style.overflowY = 'auto';
  }

  if (loaderBarSpan && window.gsap) {
    gsap.to(loaderBarSpan, { width: '100%', duration: 1.1, ease: 'power2.inOut' });
  }

  window.addEventListener('load', () => {
    setTimeout(revealSiteAndAnimateHero, 700);
  });
  // Fallback in case 'load' is slow / cached
  setTimeout(revealSiteAndAnimateHero, 3200);

  /* ---------------------------------------------------------
     2. AOS INIT
  --------------------------------------------------------- */
  if (window.AOS) {
    AOS.init({
      duration: 800,
      easing: 'ease-out-cubic',
      once: true,
      offset: 80,
    });
  }

  /* ---------------------------------------------------------
     3. CUSTOM CURSOR
  --------------------------------------------------------- */
  const cursorDot = document.querySelector('.cursor-dot');
  const cursorRing = document.querySelector('.cursor-ring');
  const hasFinePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  if (hasFinePointer && cursorDot && cursorRing) {
    let mouseX = 0, mouseY = 0, ringX = 0, ringY = 0;

    window.addEventListener('mousemove', (e) => {
      mouseX = e.clientX; mouseY = e.clientY;
      cursorDot.style.left = mouseX + 'px';
      cursorDot.style.top = mouseY + 'px';
    });

    function animateRing() {
      ringX += (mouseX - ringX) * 0.18;
      ringY += (mouseY - ringY) * 0.18;
      cursorRing.style.left = ringX + 'px';
      cursorRing.style.top = ringY + 'px';
      requestAnimationFrame(animateRing);
    }
    animateRing();

    const hoverTargets = document.querySelectorAll('a, button, .menu-row, .dish-card, .why-card, .masonry-item, input, textarea, select');
    hoverTargets.forEach(el => {
      el.addEventListener('mouseenter', () => cursorRing.classList.add('is-active'));
      el.addEventListener('mouseleave', () => cursorRing.classList.remove('is-active'));
    });
  }

  /* ---------------------------------------------------------
     4. SCROLL PROGRESS BAR
  --------------------------------------------------------- */
  const scrollProgressBar = document.getElementById('scrollProgressBar');
  function updateScrollProgress() {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
    if (scrollProgressBar) scrollProgressBar.style.width = pct + '%';
  }
  window.addEventListener('scroll', updateScrollProgress, { passive: true });
  updateScrollProgress();

  /* ---------------------------------------------------------
     5. STICKY / TRANSPARENT NAVBAR + ACTIVE LINK + BACK TO TOP
  --------------------------------------------------------- */
  const mainNav = document.getElementById('mainNav');
  const backToTop = document.getElementById('backToTop');
  const navLinks = document.querySelectorAll('#navList .nav-link[href^="#"]');
  const sections = Array.from(navLinks)
    .map(link => document.querySelector(link.getAttribute('href')))
    .filter(Boolean);

  function onScrollUI() {
    const scrolled = window.scrollY > 60;
    if (mainNav) mainNav.classList.toggle('is-scrolled', scrolled);
    if (backToTop) backToTop.classList.toggle('is-visible', window.scrollY > 500);

    // active nav link
    let currentSection = null;
    const scrollPos = window.scrollY + window.innerHeight * 0.35;
    sections.forEach(sec => {
      if (sec.offsetTop <= scrollPos) currentSection = sec;
    });
    navLinks.forEach(link => {
      const target = document.querySelector(link.getAttribute('href'));
      link.classList.toggle('active-link', target === currentSection);
    });
  }
  window.addEventListener('scroll', onScrollUI, { passive: true });
  onScrollUI();

  if (backToTop) {
    backToTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ---------------------------------------------------------
     6. SMOOTH SCROLL NAV (collapse mobile menu after click)
  --------------------------------------------------------- */
  const navCollapseEl = document.getElementById('navMenu');
  document.querySelectorAll('[data-nav]').forEach(link => {
    link.addEventListener('click', (e) => {
      const href = link.getAttribute('href');
      if (href && href.startsWith('#')) {
        const target = document.querySelector(href);
        if (target) {
          e.preventDefault();
          const offset = 80;
          const top = target.getBoundingClientRect().top + window.scrollY - offset;
          window.scrollTo({ top, behavior: 'smooth' });
        }
      }
      if (navCollapseEl && navCollapseEl.classList.contains('show') && window.bootstrap) {
        const bsCollapse = bootstrap.Collapse.getOrCreateInstance(navCollapseEl);
        bsCollapse.hide();
      }
    });
  });

  /* ---------------------------------------------------------
     7. GSAP HERO ENTRANCE ANIMATION
  --------------------------------------------------------- */
  function runHeroEntrance() {
    if (!window.gsap) return;

    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

    tl.to('.hero-section .reveal-inner', {
        y: 0, duration: 1, stagger: 0.12,
      })
      .from('[data-anim="hero-sub"]', { opacity: 0, y: 24, duration: 0.8 }, '-=0.5')
      .from('[data-anim="hero-cta"]', { opacity: 0, y: 24, duration: 0.8 }, '-=0.55')
      .from('[data-anim="hero-eyebrow"]', { opacity: 0, x: -16, duration: 0.6 }, 0)
      .from('.hero-image-frame', { opacity: 0, scale: 0.85, duration: 1.1, ease: 'power2.out' }, 0.15)
      .from('.glass-badge', { opacity: 0, y: 20, stagger: 0.15, duration: 0.7 }, '-=0.6')
      .from('.float-el', { opacity: 0, scale: 0.5, stagger: 0.1, duration: 0.6 }, '-=0.5');
  }

  /* ---------------------------------------------------------
     8. GSAP SCROLLTRIGGER — FLOATING ELEMENTS + PARALLAX
  --------------------------------------------------------- */
  if (window.gsap && window.ScrollTrigger) {
    gsap.registerPlugin(ScrollTrigger);

    // Floating decorative icons drift
    document.querySelectorAll('.float-el').forEach((el, i) => {
      gsap.to(el, {
        y: i % 2 === 0 ? -22 : 22,
        x: i % 2 === 0 ? 10 : -10,
        duration: 3.5 + i * 0.4,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
      });
    });

    // Hero parallax on scroll
    gsap.to('.hero-image-frame', {
      y: 60,
      ease: 'none',
      scrollTrigger: {
        trigger: '.hero-section',
        start: 'top top',
        end: 'bottom top',
        scrub: true,
      }
    });
    gsap.to('.hero-bg-gradient', {
      y: 80,
      ease: 'none',
      scrollTrigger: {
        trigger: '.hero-section',
        start: 'top top',
        end: 'bottom top',
        scrub: true,
      }
    });

    // Section reveal for elements not already handled by AOS (extra premium polish)
    gsap.utils.toArray('.menu-row').forEach((row, i) => {
      gsap.from(row, {
        opacity: 0, y: 24,
        duration: 0.6, delay: (i % 6) * 0.03,
        scrollTrigger: { trigger: row, start: 'top 92%' }
      });
    });
  }

  /* ---------------------------------------------------------
     9. ANIMATED COUNTERS (Intersection Observer driven)
  --------------------------------------------------------- */
  const counters = document.querySelectorAll('.stat-number');
  if (counters.length) {
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    counters.forEach(c => counterObserver.observe(c));
  }

  function animateCounter(el) {
    const target = parseInt(el.getAttribute('data-count'), 10) || 0;
    const duration = 1600;
    const startTime = performance.now();

    function tick(now) {
      const progress = Math.min((now - startTime) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3); // ease-out-cubic
      el.textContent = Math.floor(eased * target);
      if (progress < 1) {
        requestAnimationFrame(tick);
      } else {
        el.textContent = target;
      }
    }
    requestAnimationFrame(tick);
  }

  /* ---------------------------------------------------------
     10. MAGNETIC BUTTONS
  --------------------------------------------------------- */
  const magneticButtons = document.querySelectorAll('.magnetic-btn');
  if (hasFinePointer) {
    magneticButtons.forEach(btn => {
      const strength = 18;
      btn.addEventListener('mousemove', (e) => {
        const rect = btn.getBoundingClientRect();
        const relX = e.clientX - rect.left - rect.width / 2;
        const relY = e.clientY - rect.top - rect.height / 2;
        if (window.gsap) {
          gsap.to(btn, {
            x: (relX / rect.width) * strength,
            y: (relY / rect.height) * strength,
            duration: 0.4,
            ease: 'power2.out'
          });
        }
      });
      btn.addEventListener('mouseleave', () => {
        if (window.gsap) gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: 'power3.out' });
      });
    });
  }

  /* ---------------------------------------------------------
     11. MENU FILTERING
  --------------------------------------------------------- */
  const filterButtons = document.querySelectorAll('.filter-btn');
  const menuRows = document.querySelectorAll('.menu-row');

  filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      filterButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.getAttribute('data-filter');

      menuRows.forEach(row => {
        const matches = filter === 'all' || row.getAttribute('data-cat') === filter;
        if (matches) {
          row.classList.remove('is-hidden');
          if (window.gsap) {
            gsap.fromTo(row, { opacity: 0, y: 14 }, { opacity: 1, y: 0, duration: 0.45, ease: 'power2.out' });
          }
        } else {
          row.classList.add('is-hidden');
        }
      });
    });
  });

  /* ---------------------------------------------------------
     12. SWIPER — FEATURED DISHES
  --------------------------------------------------------- */
  if (window.Swiper) {
    const featuredSwiper = new Swiper('.featured-swiper', {
      slidesPerView: 1.15,
      spaceBetween: 24,
      centeredSlides: false,
      grabCursor: true,
      breakpoints: {
        576: { slidesPerView: 1.6 },
        768: { slidesPerView: 2.3 },
        1200: { slidesPerView: 3.3 },
      },
    });

    const featPrev = document.getElementById('featuredPrev');
    const featNext = document.getElementById('featuredNext');
    if (featPrev) featPrev.addEventListener('click', () => featuredSwiper.slidePrev());
    if (featNext) featNext.addEventListener('click', () => featuredSwiper.slideNext());

    /* -------------------------------------------------------
       13. SWIPER — TESTIMONIALS
    ------------------------------------------------------- */
    new Swiper('.testimonial-swiper', {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: true,
      grabCursor: true,
      autoplay: { delay: 5500, disableOnInteraction: false },
      pagination: { el: '.testimonial-pagination', clickable: true },
      breakpoints: {
        768: { slidesPerView: 2 },
        1200: { slidesPerView: 2 },
      },
    });
  }

  /* ---------------------------------------------------------
     14. GALLERY LIGHTBOX
  --------------------------------------------------------- */
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightboxImg');
  const lightboxClose = document.getElementById('lightboxClose');
  const galleryImages = document.querySelectorAll('.masonry-item img');

  galleryImages.forEach(img => {
    img.addEventListener('click', () => {
      if (lightbox && lightboxImg) {
        lightboxImg.src = img.src;
        lightboxImg.alt = img.alt;
        lightbox.classList.add('is-open');
      }
    });
  });

  function closeLightbox() {
    if (lightbox) lightbox.classList.remove('is-open');
  }
  if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
  if (lightbox) {
    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) closeLightbox();
    });
  }
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeLightbox();
  });

  /* ---------------------------------------------------------
     15. RESERVATION FORM SUBMISSION (front-end only)
  --------------------------------------------------------- */
  const reservationForm = document.getElementById('reservationForm');
  const formSuccess = document.getElementById('formSuccess');
  const resSubmitBtn = document.getElementById('resSubmitBtn');
  const resSubmitText = document.getElementById('resSubmitText');

  if (reservationForm) {
    // Set min date to today
    const resDateInput = document.getElementById('resDate');
    if (resDateInput) {
      const today = new Date().toISOString().split('T')[0];
      resDateInput.setAttribute('min', today);
    }

    reservationForm.addEventListener('submit', (e) => {
      e.preventDefault();
      if (!reservationForm.checkValidity()) {
        reservationForm.reportValidity();
        return;
      }

      const originalText = resSubmitText.innerHTML;
      resSubmitText.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sending…';
      resSubmitBtn.disabled = true;

      setTimeout(() => {
        if (formSuccess) formSuccess.classList.add('is-visible');
        resSubmitText.innerHTML = '<i class="fa-solid fa-check"></i> Sent!';
        if (window.gsap) {
          gsap.fromTo(formSuccess, { opacity: 0, y: 10 }, { opacity: 1, y: 0, duration: 0.5 });
        }
        setTimeout(() => {
          reservationForm.reset();
          resSubmitText.innerHTML = originalText;
          resSubmitBtn.disabled = false;
        }, 2600);
      }, 1100);
    });
  }

  /* ---------------------------------------------------------
     16. CONTACT FORM SUBMISSION (front-end only)
  --------------------------------------------------------- */
  const contactForm = document.getElementById('contactForm');
  const contactSuccess = document.getElementById('contactSuccess');

  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      if (!contactForm.checkValidity()) {
        contactForm.reportValidity();
        return;
      }
      if (contactSuccess) {
        contactSuccess.classList.add('is-visible');
        if (window.gsap) {
          gsap.fromTo(contactSuccess, { opacity: 0, y: 10 }, { opacity: 1, y: 0, duration: 0.5 });
        }
      }
      setTimeout(() => {
        contactForm.reset();
      }, 600);
    });
  }

  /* ---------------------------------------------------------
     17. NEWSLETTER SUBSCRIBE (front-end only)
  --------------------------------------------------------- */
  const newsletterForm = document.getElementById('newsletterForm');
  const newsletterSuccess = document.getElementById('newsletterSuccess');

  if (newsletterForm) {
    newsletterForm.addEventListener('submit', (e) => {
      e.preventDefault();
      if (newsletterSuccess) newsletterSuccess.classList.add('is-visible');
      newsletterForm.reset();
      setTimeout(() => {
        if (newsletterSuccess) newsletterSuccess.classList.remove('is-visible');
      }, 4000);
    });
  }

});
