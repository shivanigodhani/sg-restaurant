<!-- ============ FOOTER ============ -->
<footer class="sora-footer">
  <div class="container">
    <div class="row gy-5">
      <div class="col-lg-4">
        <a href="#hero" class="sora-brand footer-brand" data-nav>SORA<span class="brand-dot">.</span></a>
        <p class="footer-text">A seasonal tasting kitchen and cafe in Surat — slow food, quiet hospitality, since 2012.</p>
        <div class="social-row social-row--footer">
          <a href="#" aria-label="SORA on Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" aria-label="SORA on Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" aria-label="SORA on Pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
          <a href="#" aria-label="SORA on TripAdvisor"><i class="fa-brands fa-tripadvisor"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-6">
        <h4 class="footer-heading">Explore</h4>
        <ul class="footer-links">
          <li><a href="#about" data-nav>About</a></li>
          <li><a href="#menu" data-nav>Menu</a></li>
          <li><a href="#chef" data-nav>Chef</a></li>
          <li><a href="#gallery" data-nav>Gallery</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-6">
        <h4 class="footer-heading">Visit</h4>
        <ul class="footer-links">
          <li><a href="#events" data-nav>Events</a></li>
          <li><a href="#reserve" data-nav>Reserve</a></li>
          <li><a href="#contact" data-nav>Contact</a></li>
          <li><a href="#hero" data-nav>Gift Cards</a></li>
        </ul>
      </div>

      <div class="col-lg-4">
        <h4 class="footer-heading">Stay in the loop</h4>
        <p class="footer-text">Seasonal menu drops and event invitations — no spam, ever.</p>
        <form class="newsletter-form" id="newsletterForm">
          <input type="email" placeholder="Your email address" required aria-label="Email for newsletter">
          <button type="submit" aria-label="Subscribe"><i class="fa-solid fa-paper-plane"></i></button>
        </form>
        <p class="newsletter-success" id="newsletterSuccess"><i class="fa-solid fa-circle-check"></i> Subscribed — welcome to SORA.</p>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© <span id="year"></span> SORA Restaurant &amp; Cafe. All rights reserved.</p>
      <p>Crafted with care in Surat, Gujarat.</p>
    </div>
  </div>
</footer>

<!-- ============ FLOATING UI ============ -->
<a href="#reserve" class="floating-reserve-btn" data-nav aria-label="Reserve a table">
  <i class="fa-regular fa-calendar-check"></i>
  <span>Reserve</span>
</a>

<button class="back-to-top" id="backToTop" aria-label="Back to top">
  <i class="fa-solid fa-arrow-up"></i>
</button>

<!-- ============ SCRIPTS ============ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>