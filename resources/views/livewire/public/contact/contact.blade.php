<section class="bg-[#dff3f4] py-20">

  <div class="max-w-7xl mx-auto px-6">

    <span class="text-blue font-bold tracking-widest uppercase
                     text-2xl md:text-3xl">
      Contact Us
    </span>
    <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

    <!-- GRID LAYOUT -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

      <!-- LEFT CONTACT FORM (70%) -->
      <div class="lg:col-span-8 bg-[#bfe3e6] rounded-[30px] p-12 shadow-lg">

        <h2 class="text-3xl font-semibold text-[#2e2a7b] mb-8">
          Get in touch with us.
        </h2>

        <form class="space-y-6">

          <!-- Full Name -->
          <div>
            <label class="block text-[#2e2a7b] font-medium mb-2">
              Full Name
            </label>
            <input type="text"
              placeholder="Enter your name"
              class="w-full px-5 py-3 rounded-xl
                                   bg-[#dff3f4] border border-[#2e2a7b]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
          </div>

          <!-- Email -->
          <div>
            <label class="block text-[#2e2a7b] font-medium mb-2">
              Email Address
            </label>
            <input type="email"
              placeholder="Enter your email"
              class="w-full px-5 py-3 rounded-xl
                                   bg-[#dff3f4] border border-[#2e2a7b]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
          </div>

          <!-- Phone -->
          <div>
            <label class="block text-[#2e2a7b] font-medium mb-2">
              Phone Number
            </label>
            <input type="text"
              placeholder="Enter your phone"
              class="w-full px-5 py-3 rounded-xl
                                   bg-[#dff3f4] border border-[#2e2a7b]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
          </div>

          <!-- Country -->
          <div>
            <label class="block text-[#2e2a7b] font-medium mb-2">
              Country
            </label>
            <input type="text"
              class="w-full px-5 py-3 rounded-xl
                                   bg-[#dff3f4] border border-[#2e2a7b]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
          </div>

          <!-- Message -->
          <div>
            <label class="block text-[#2e2a7b] font-medium mb-2">
              Message
            </label>
            <textarea rows="4"
              class="w-full px-5 py-3 rounded-xl
                                   bg-[#dff3f4] border border-[#2e2a7b]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30"></textarea>
          </div>

          <!-- Submit -->
          <button type="submit"
            class="w-full bg-[#19b6b6] text-blue
                               py-3 rounded-xl font-semibold
                               hover:opacity-90 transition">
            SUBMIT
          </button>

        </form>
      </div>

      <!-- RIGHT CONTACT INFO (30%) -->
      <div class="lg:col-span-4 bg-[#bfe3e6] rounded-[30px] p-8 shadow-lg space-y-8">

        <h2 class="text-2xl font-semibold text-[#2e2a7b]">
          Need more help?
        </h2>

        <!-- Call -->
        <div class="flex gap-4 items-start">
          <i class="ri-phone-line text-xl text-[#2e2a7b]"></i>
          <div>
            <p class="font-semibold text-[#2e2a7b] text-sm">Call Now</p>
            <p class="text-sm text-[#2e2a7b]/70">(123) 456-7891</p>
            <p class="text-sm text-[#2e2a7b]/70">(907) 456-7891</p>
          </div>
        </div>

        <!-- Email -->
        <div class="flex gap-4 items-start">
          <i class="ri-mail-line text-xl text-[#2e2a7b]"></i>
          <div>
            <p class="font-semibold text-[#2e2a7b] text-sm">Email</p>
            <p class="text-sm text-[#2e2a7b]/70">info@example.com</p>
            <p class="text-sm text-[#2e2a7b]/70">support@example.com</p>
          </div>
        </div>

        <!-- Location -->
        <div class="flex gap-4 items-start">
          <i class="ri-map-pin-line text-xl text-[#2e2a7b]"></i>
          <div>
            <p class="font-semibold text-[#2e2a7b] text-sm">Location</p>
            <p class="text-sm text-[#2e2a7b]/70">
              Royal Ln, Mesa,<br>
              New Jersey 45643
            </p>
          </div>
        </div>

        <!-- Map -->
        <div class="rounded-2xl overflow-hidden shadow-md">
          <img src="{{ asset('images/world-map.png') }}"
            alt="Map"
            class="w-full h-56 object-cover">
        </div>

      </div>

    </div>

  </div>

</section>