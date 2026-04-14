@php
  $contactPage = \App\Models\Page::where('slug', 'reach-us')->first();

  $metaTitle = $contactPage?->meta_title
    ?? $contactPage?->title
    ?? setting('seo_title', config('app.name'));

  $metaDescription = $contactPage?->meta_description
    ?? setting('seo_description');

  $metaKeywords = $contactPage?->meta_keywords
    ?? setting('seo_keywords');
@endphp

@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)
@section('meta_keywords', $metaKeywords)

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

        <h2 class="text-3xl font-semibold text-blue mb-6">
          Get in touch with us.
        </h2>



        <form wire:submit.prevent="submit" class="space-y-6">

          <!-- Full Name -->
          <div>
            <label class="block text-blue font-medium mb-2">
              Full Name
            </label>
            <input type="text"
              placeholder="Enter your name"
              wire:model.defer="name"
              wire:loading.attr="disabled"
              wire:target="submit"
              class="w-full px-5 py-3 rounded-xl
                                   bg-[#dff3f4] border border-[#2e2a7b]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
            @error('name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Email -->
          <div>
            <label class="block text-blue font-medium mb-2">
              Email Address
            </label>
            <input type="email"
              placeholder="Enter your email"
              wire:model.defer="email"
              wire:loading.attr="disabled"
              wire:target="submit"
              class="w-full px-5 py-3 rounded-xl
                                   bg-[#dff3f4] border border-[#2e2a7b]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
            @error('email')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Phone -->
          <div>
            <label class="block text-blue font-medium mb-2">
              Phone Number
            </label>
            <input type="text"
              placeholder="Enter your phone"
              wire:model.defer="phone"
              wire:loading.attr="disabled"
              wire:target="submit"
              class="w-full px-5 py-3 rounded-xl
                                   bg-[#dff3f4] border border-[#2e2a7b]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
            @error('phone')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Country -->
          <div>
            <label class="block text-blue font-medium mb-2">
              Country
            </label>
            <input type="text"
              wire:model.defer="country"
              wire:loading.attr="disabled"
              wire:target="submit"
              class="w-full px-5 py-3 rounded-xl
                                   bg-[#dff3f4] border border-[#2e2a7b]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
            @error('country')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Message -->
          <div>
            <label class="block text-blue font-medium mb-2">
              Message
            </label>
            <textarea rows="4"
              wire:model.defer="message"
              wire:loading.attr="disabled"
              wire:target="submit"
              class="w-full px-5 py-3 rounded-xl
                                   bg-[#dff3f4] border border-[#2e2a7b]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30"></textarea>
            @error('message')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
          </div>
          @if (session('success'))
          <div class="mb-6 px-4 py-3 font-semibold text-blue text-sm">
            {{ session('success') }}
          </div>
          @endif

          <div wire:loading wire:target="submit" class="text-sm text-blue font-medium">
            Sending your message...
          </div>

          <!-- Submit -->
          <button type="submit"
            wire:target="submit"
            wire:loading.attr="disabled"
            wire:loading.class="opacity-70 cursor-not-allowed"
            class="w-full bg-[#19b6b6] text-blue
                               py-3 rounded-xl font-semibold
                               hover:opacity-90 transition
                               flex items-center justify-center">
            <span wire:loading.remove wire:target="submit">
              SUBMIT
            </span>
            <span wire:loading wire:target="submit" class="flex items-center gap-2 text-sm">
              <span class="h-2 w-2 rounded-full bg-blue animate-ping"></span>
              <span>Submitting...</span>
            </span>
          </button>

        </form>
      </div>

      <!-- RIGHT CONTACT INFO (30%) -->
      <div class="lg:col-span-4 bg-[#bfe3e6] rounded-[30px] p-8 shadow-lg space-y-8">

        <h2 class="text-2xl font-semibold text-blue">
          Need more help?
        </h2>

        <!-- Call -->
        <div class="flex gap-4 items-start">
          <i class="ri-phone-line text-xl text-blue"></i>
          <div>
            <p class="font-semibold text-blue text-sm">Call Now</p>
            <p class="text-sm text-blue/70"><a href="tel:{{ setting('phone_number', '(123) 456-7891') }}" class="hover:underline">{{ setting('phone_number', '(123) 456-7891') }}</a></p>
          </div>
        </div>

        <!-- Email -->
        <div class="flex gap-4 items-start">
          <i class="ri-mail-line text-xl text-blue"></i>
          <div>
            <p class="font-semibold text-blue text-sm">Email</p>
            <p class="text-sm text-blue/70"><a href="mailto:{{ setting('contact_email', 'info@example.com') }}" class="hover:underline">{{ setting('contact_email', 'info@example.com') }}</a></p>
          </div>
        </div>

        <!-- Location -->
        <div class="flex gap-4 items-start">
          <i class="ri-map-pin-line text-xl text-blue"></i>
          <div>
            <p class="font-semibold text-blue text-sm">Location</p>
            <p class="text-sm text-blue/70">
              {!! nl2br(e(setting('contact_address', "Royal Ln, Mesa,\nNew Jersey 45643"))) !!}
            </p>
          </div>
        </div>

        <!-- Map -->
        <div class="rounded-2xl overflow-hidden shadow-md mt-2">
          <iframe  class="w-full h-56 md:h-72 border-0"
            style="border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.1451115842015!2d77.48018239999999!3d28.655373400000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cf3a4d3e503d9%3A0x4bae765955c98d20!2sPark%20Town%20Commercial!5e0!3m2!1sen!2sin!4v1771483986028!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>

      </div>

    </div>

  </div>

</section>
