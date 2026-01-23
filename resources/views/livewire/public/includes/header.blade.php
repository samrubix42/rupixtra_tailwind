<div>
  <header class="hidden md:block bg-white border border-gray-200 shadow-xl">
    <div class="relative mx-auto px-[3%] py-4">

      <!-- LEFT: Logo -->
      <div class="absolute left-[3%] top-1/2 -translate-y-1/2">
        <img src="{{ asset('images/logo-light.png') }}" class="h-10" />
      </div>

      <!-- CENTER: Menu Links -->
      <nav class="flex justify-center items-center gap-8 py-3 text-normal font-medium text-gray-700">
        <a href="#" class="hover:text-primary">Home</a>
        <a href="#" class="hover:text-primary">Our Story</a>

        <!-- Dropdown -->
        <div
          x-data="{ open: false }"
          @mouseenter="open = true"
          @mouseleave="open = false"
          class="relative">
          <button class="flex items-center gap-1 hover:text-primary">
            Our Offerings
            <i class="ri-arrow-down-s-line text-sm"></i>
          </button>

          <div
            x-show="open"
            x-transition
            class="absolute left-1/2 -translate-x-1/2 mt-3
         w-56 bg-[#002a53] text-white
         rounded-lg shadow-xl
         z-50">
            <a href="#" class="block px-4 py-2 hover:bg-[#004080]">Personal Loan</a>
            <a href="#" class="block px-4 py-2 hover:bg-[#004080]">Business Loan</a>
            <a href="#" class="block px-4 py-2 hover:bg-[#004080]">Home Loan</a>
            <a href="#" class="block px-4 py-2 hover:bg-[#004080]">LAP</a>
            <a href="#" class="block px-4 py-2 hover:bg-[#004080]">Credit Card</a>
            <a href="#" class="block px-4 py-2 hover:bg-[#004080]">Self Employed Loan</a>
          </div>

        </div>

        <a href="#" class="hover:text-primary">Blog</a>
        <a href="#" class="hover:text-primary">Reach Us</a>
      </nav>

      <!-- RIGHT: Search + Icons -->
      <div class="absolute right-[3%] top-1/2 -translate-y-1/2 flex items-center gap-3">

        <!-- Search -->
        <div class="relative w-[250px]">
          <input
            type="text"
            placeholder="Search..."
            class="w-full bg-gray-100 border border-gray-300 rounded-md
                 px-3 py-2 text-sm
                 focus:outline-none focus:ring-2 focus:ring-primary" />
          <i class="ri-search-line absolute right-3 top-1/2 -translate-y-1/2 text-primary text-sm"></i>
        </div>

        <!-- Icons -->
        <button class="p-1.5 rounded-full text-primary hover:bg-gray-100">
          <i class="ri-phone-line text-lg"></i>
        </button>
        <i class="ri-whatsapp-line text-xl text-primary"></i>
      </div>

    </div>
  </header>

  <header x-data="{ open: false, offerings: false }" class="md:hidden">
    <div class="px-4 py-4">

      <!-- Top Row -->
      <div class="flex items-center justify-between">
        <img src="{{ asset('images/logo-light.png') }}" class="h-8" />

        <div class="flex items-center gap-2">
          <button class="p-2 rounded-full hover:bg-white/10">
            <i class="ri-phone-line text-xl"></i>
          </button>

          <button @click="open = true" class="p-2 rounded-full hover:bg-white/10">
            <i class="ri-menu-3-line text-2xl"></i>
          </button>
        </div>
      </div>

      <!-- Search -->
      <div class="relative mt-4">
        <input
          type="text"
          placeholder="Search..."
          class="w-full bg-zinc-100 text-gray-800 border border-zinc-300 rounded-lg
               pl-4 pr-12 py-2.5 text-sm
               focus:outline-none focus:ring-2 focus:ring-zinc-400" />
        <i class="ri-search-line absolute right-4 top-1/2 -translate-y-1/2 text-primary text-lg"></i>
      </div>
    </div>

    <!-- FULL SCREEN MENU -->
    <div
      x-show="open"
      x-transition
      x-cloak
      class="fixed inset-0 bg-primary text-white z-50">
      <!-- Header -->
      <div class="flex items-center justify-between px-4 py-4">
        <img src="{{ asset('images/logo-dark.png') }}" class="h-8" />
        <button @click="open = false">
          <i class="ri-close-line text-2xl"></i>
        </button>
      </div>

      <!-- Nav -->
      <nav class="px-6 py-6 space-y-6 text-base font-medium">

        <a href="#" class="block">Home</a>

        <!-- Dropdown -->
        <div>
          <button
            @click="offerings = !offerings"
            class="flex items-center justify-between w-full">
            Our Offerings
            <i :class="offerings ? 'ri-arrow-up-s-line' : 'ri-arrow-down-s-line'"></i>
          </button>

          <div x-show="offerings" x-transition class="mt-3 ml-4 space-y-3 text-sm opacity-90">
            <a href="#" class="block">Loans</a>
            <a href="#" class="block">Mutual Funds</a>
            <a href="#" class="block">Insurance</a>
            <a href="#" class="block">Calculator</a>
          </div>
        </div>

        <a href="#" class="block">Blog</a>
        <a href="#" class="block">Reach Us</a>
      </nav>
    </div>
  </header>

</div>