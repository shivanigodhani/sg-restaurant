
<!-- ============ RESERVATION ============ -->
<section id="reserve" class="section reservation-section">
  <div class="reservation-bg" aria-hidden="true"></div>
  <div class="container">
    <div class="row gy-5 align-items-center">
      <div class="col-lg-5" data-aos="fade-right">
        <p class="eyebrow"><span class="eyebrow-line"></span>Reservations</p>
        <h2 class="section-title">Save your table for an evening to remember</h2>
        <p class="section-text">
          Tables are released ninety days in advance. For parties of eight or more,
          or to request the chef's table, call us directly.
        </p>
        <ul class="reserve-points">
          <li><i class="fa-solid fa-circle-check"></i> Confirmation within 2 hours</li>
          <li><i class="fa-solid fa-circle-check"></i> Free cancellation up to 24h before</li>
          <li><i class="fa-solid fa-circle-check"></i> Dietary notes welcomed at booking</li>
        </ul>
        <a href="tel:+912614567890" class="reserve-phone"><i class="fa-solid fa-phone"></i> +91 261 456 7890</a>
      </div>

      <div class="col-lg-7" data-aos="fade-left">
        <form class="reservation-form glass-panel" id="reservationForm" novalidate>
          <div class="row g-3">
            <div class="col-md-6">
              <label for="resName" class="form-label">Full Name</label>
              <input type="text" class="form-control sora-input" id="resName" placeholder="Your name" required>
            </div>
            <div class="col-md-6">
              <label for="resPhone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control sora-input" id="resPhone" placeholder="+91 00000 00000" required>
            </div>
            <div class="col-md-6">
              <label for="resDate" class="form-label">Date</label>
              <input type="date" class="form-control sora-input" id="resDate" required>
            </div>
            <div class="col-md-6">
              <label for="resTime" class="form-label">Time</label>
              <input type="time" class="form-control sora-input" id="resTime" required>
            </div>
            <div class="col-md-6">
              <label for="resGuests" class="form-label">Guests</label>
              <select class="form-select sora-input" id="resGuests" required>
                <option value="" disabled selected>Select guests</option>
                <option>1 Guest</option>
                <option>2 Guests</option>
                <option>3 Guests</option>
                <option>4 Guests</option>
                <option>5 Guests</option>
                <option>6 Guests</option>
                <option>7+ Guests (call us)</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="resOccasion" class="form-label">Occasion (optional)</label>
              <select class="form-select sora-input" id="resOccasion">
                <option value="" selected>None</option>
                <option>Birthday</option>
                <option>Anniversary</option>
                <option>Business Dinner</option>
                <option>Date Night</option>
              </select>
            </div>
            <div class="col-12">
              <label for="resNote" class="form-label">Special Request</label>
              <textarea class="form-control sora-input" id="resNote" rows="3" placeholder="Allergies, seating preference, celebration details…"></textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-sora-primary w-100 magnetic-btn" id="resSubmitBtn">
                <span class="magnetic-inner" id="resSubmitText">Confirm Reservation <i class="fa-solid fa-arrow-right-long"></i></span>
              </button>
            </div>
          </div>
          <div class="form-success" id="formSuccess">
            <i class="fa-solid fa-circle-check"></i>
            <p>Reservation request sent — we'll confirm by phone shortly.</p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
