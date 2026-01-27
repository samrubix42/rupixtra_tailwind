<div>

  <!-- ================= HERO ================= -->
  <section class="bg-primary py-16 sm:py-24 text-white">
    <div class="max-w-6xl mx-auto px-4 text-center">

      <span class="text-xs tracking-[0.3em] uppercase text-secondary">
        Contact Us
      </span>

      <h1 class="mt-4 sm:mt-6 text-3xl sm:text-5xl font-semibold">
        We’re Here to Help You
      </h1>

      <p class="mt-4 max-w-2xl mx-auto text-white/70 text-base sm:text-lg">
        Have questions about loans, eligibility, or documentation?
        Our team is ready to assist you at every step.
      </p>

    </div>
  </section>

  <!-- ================= CONTACT INFO ================= -->
  <section class="bg-secondary/25 py-10 sm:py-12">
    <div class="max-w-6xl mx-auto px-4 grid gap-6 sm:grid-cols-2 md:grid-cols-3">

      <!-- Call -->
      <div class="bg-white rounded-2xl p-6 text-center
                  border border-secondary/40 shadow-sm">
        <div class="w-12 h-12 mx-auto flex items-center justify-center
                    rounded-full bg-primary/10 text-primary">
          <i class="ri-phone-line text-xl"></i>
        </div>
        <p class="mt-4 text-sm text-primary/70">Call Us</p>
        <a href="tel:+919876543210" class="font-semibold text-primary">
          +91 98765 43210
        </a>
      </div>

      <!-- Email -->
      <div class="bg-white rounded-2xl p-6 text-center
                  border border-secondary/40 shadow-sm">
        <div class="w-12 h-12 mx-auto flex items-center justify-center
                    rounded-full bg-primary/10 text-primary">
          <i class="ri-mail-line text-xl"></i>
        </div>
        <p class="mt-4 text-sm text-primary/70">Email</p>
        <a href="mailto:support@loansite.com" class="font-semibold text-primary">
          support@loansite.com
        </a>
      </div>

      <!-- Hours -->
      <div class="bg-white rounded-2xl p-6 text-center
                  border border-secondary/40 shadow-sm">
        <div class="w-12 h-12 mx-auto flex items-center justify-center
                    rounded-full bg-primary/10 text-primary">
          <i class="ri-time-line text-xl"></i>
        </div>
        <p class="mt-4 text-sm text-primary/70">Working Hours</p>
        <p class="font-semibold text-primary">
          Mon – Sat, 9:00 AM – 6:00 PM
        </p>
      </div>

    </div>
  </section>

  <!-- ================= IMAGE + FORM ================= -->
  <section class="relative py-20 sm:py-24 bg-secondary/15 overflow-hidden">

    <div class="absolute -top-48 right-0 w-[520px] h-[520px]
                bg-secondary/40 blur-[200px] rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-4">
      <div class="grid lg:grid-cols-2 gap-12 sm:gap-20 items-center">

        <!-- FORM (FIRST ON MOBILE) -->
        <div class="bg-white rounded-3xl shadow-xl
                    p-6 sm:p-10 lg:p-12
                    border border-secondary/40 order-1 lg:order-2">

          <span class="inline-flex items-center gap-2
                       text-xs tracking-[0.25em] uppercase text-secondary">
            <i class="ri-phone-line"></i> Contact Us
          </span>

          <h2 class="mt-4 text-2xl sm:text-3xl font-semibold text-primary">
            Request a Call Back
          </h2>

          <p class="mt-3 text-gray-600">
            Share your details and our loan specialist will contact you shortly.
          </p>

          <form class="mt-8 space-y-6">

            <div class="grid gap-6 sm:grid-cols-2">
              <input type="text" placeholder="Full Name"
                class="w-full rounded-xl border border-secondary/60
                       px-4 py-3 focus:outline-none focus:border-accent
                       focus:ring-2 focus:ring-accent/20">

              <input type="text" placeholder="Mobile Number"
                class="w-full rounded-xl border border-secondary/60
                       px-4 py-3 focus:outline-none focus:border-accent
                       focus:ring-2 focus:ring-accent/20">
            </div>

            <select
              class="w-full rounded-xl border border-secondary/60
                     px-4 py-3 bg-white focus:outline-none
                     focus:border-accent focus:ring-2 focus:ring-accent/20">
              <option>Select loan type</option>
              <option>Personal Loan</option>
              <option>Home Loan</option>
              <option>Business Loan</option>
              <option>Car Loan</option>
            </select>

            <textarea rows="4" placeholder="Message (optional)"
              class="w-full rounded-xl border border-secondary/60
                     px-4 py-3 focus:outline-none
                     focus:border-accent focus:ring-2 focus:ring-accent/20"></textarea>

            <button class="w-full bg-primary text-white py-4 rounded-xl font-medium">
              Get Expert Assistance
            </button>

            <p class="text-xs text-gray-500 flex justify-center gap-2">
              <i class="ri-lock-line"></i> Your information is secure
            </p>

          </form>
        </div>

        <!-- IMAGE / TRUST -->
        <div class="relative h-[320px] sm:h-[420px] lg:h-[520px]
                    rounded-3xl overflow-hidden shadow-2xl
                    order-2 lg:order-1">

          <img src="{{ asset('images/contact.jpg') }}"
               class="absolute inset-0 w-full h-full object-cover">

          <div class="absolute inset-0 bg-primary/75"></div>

          <div class="relative z-10 p-10 text-white h-full flex flex-col justify-end">
            <h3 class="text-2xl font-semibold text-secondary">
              Trusted Loan Guidance
            </h3>
            <p class="mt-3 text-white/80">
              Transparent, RBI-compliant, and secure loan assistance.
            </p>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- ================= MAP ================= -->
  <section class="relative h-[60vh] sm:h-screen w-full">
    <iframe
      src="https://www.google.com/maps?q=MG%20Road%20Mumbai&output=embed"
      class="absolute inset-0 w-full h-full border-0"></iframe>

    <div class="absolute inset-0 bg-primary/10"></div>

    <div class="relative z-10 h-full flex items-end sm:items-center px-4 pb-6 sm:pb-0">
      <div class="bg-white p-6 sm:p-10 rounded-2xl shadow-xl
                  border border-secondary/40 w-full sm:max-w-md">
        <h3 class="text-xl font-semibold text-primary">
          Visit Our Office
        </h3>
        <p class="mt-3 text-gray-600">
          MG Road, Mumbai – 400001
        </p>
        <a href="https://maps.google.com?q=MG+Road+Mumbai"
           target="_blank"
           class="inline-flex items-center gap-2 mt-4
                  px-6 py-3 bg-primary text-white rounded-lg text-sm">
          <i class="ri-direction-line"></i> Get Directions
        </a>
      </div>
    </div>
  </section>

  <!-- ================= DISCLAIMER ================= -->
  <section class="bg-primary py-8 sm:py-12 text-center text-white">
    <p class="text-xs sm:text-sm text-white/70 max-w-4xl mx-auto px-4">
      We do not charge any upfront fees. Loan approval is subject to eligibility.
      Your data is secure and used only for loan processing.
    </p>
  </section>

</div>
