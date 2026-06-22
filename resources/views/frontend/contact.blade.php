
<!-- ============ CONTACT ============ -->
<section id="contact" class="section contact-section">
  <div class="container">
    <div class="row gy-5">
      <div class="col-lg-6" data-aos="fade-right">
        <p class="eyebrow"><span class="eyebrow-line"></span>Visit Us</p>
        <h2 class="section-title">Find your way to SORA</h2>

        <div class="contact-map" role="img" aria-label="Map placeholder showing SORA's location in Surat, Gujarat">
          <div class="contact-map-pin"><i class="fa-solid fa-location-dot"></i></div>
          <div class="contact-map-grid"></div>
        </div>

        <div class="contact-info-grid">
          <div class="contact-info-item">
            <i class="fa-solid fa-location-dot"></i>
            <div><strong>Address</strong><span>12 Vesu Courtyard, Surat, Gujarat 395007</span></div>
          </div>
          <div class="contact-info-item">
            <i class="fa-solid fa-clock"></i>
            <div><strong>Hours</strong><span>Mon–Sun, 12:00 PM – 11:30 PM</span></div>
          </div>
          <div class="contact-info-item">
            <i class="fa-solid fa-phone"></i>
            <div><strong>Phone</strong><span>+91 261 456 7890</span></div>
          </div>
          <div class="contact-info-item">
            <i class="fa-solid fa-envelope"></i>
            <div><strong>Email</strong><span>hello@sora-dining.com</span></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form method="POST" action="{{ route('admin.contacts.send') }}" class="contact-form glass-panel" id="contactForm" novalidate>
          @csrf
          <h3 class="mb-4">Send us a message</h3>
          <div class="row g-3">
            <div class="col-md-6">
              <label for="cName" class="form-label">Name</label>
              <input type="text" class="form-control sora-input" name="name" placeholder="Your name" required>
            </div>
            <div class="col-md-6">
              <label for="cEmail" class="form-label">Email</label>
              <input type="email" class="form-control sora-input" name="email" placeholder="you@email.com" required>
            </div>
            <div class="col-12">
              <label for="cSubject" class="form-label">Subject</label>
              <input type="text" class="form-control sora-input" name="subject" placeholder="Private events, feedback, press…">
            </div>
            <div class="col-12">
              <label for="cMessage" class="form-label">Message</label>
              <textarea class="form-control sora-input" name="message" rows="4" placeholder="Tell us a little more…" required></textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-sora-outline w-100 magnetic-btn">
                <span class="magnetic-inner">Send Message <i class="fa-solid fa-paper-plane"></i></span>
              </button>
            </div>
          </div>
          <div class="form-success" id="contactSuccess">
            <i class="fa-solid fa-circle-check"></i>
            <p>Message sent — our team will reply within one business day.</p>
          </div>
        </form>

        <div class="social-row">
          <a href="#" aria-label="SORA on Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" aria-label="SORA on Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" aria-label="SORA on Pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
          <a href="#" aria-label="SORA on TripAdvisor"><i class="fa-brands fa-tripadvisor"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
