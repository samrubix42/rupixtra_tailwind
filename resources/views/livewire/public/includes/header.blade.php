<div>
  <header class="hidden md:block bg-white shadow-sm">
    <div class="mx-auto">

      <!-- Top Bar -->
      <div class="flex items-center gap-6 py-4 px-[3%]">
        <img src="{{ asset('images/logo-light.png') }}" class="h-9" />

        <!-- Search -->
        <div class="flex-1 relative">
          <input
            type="text"
            placeholder="Search services, loans, EMI..."
            class="w-full bg-gray-100 border border-gray-300 rounded-lg
                 pl-4 pr-12 py-2.5 text-sm
                 focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white" />
          <i class="ri-search-line absolute right-4 top-1/2 -translate-y-1/2 text-primary text-lg"></i>
        </div>

        <!-- Icons -->
        <div class="flex items-center gap-3 text-primary">
          <button class="p-2 rounded-full hover:bg-gray-100">
            <i class="ri-phone-line text-xl"></i>
          </button>
          <i class="ri-whatsapp-line text-2xl"></i>
        </div>
      </div>

      <!-- Bottom Nav -->
      <nav class="flex items-center bg-primary text-white px-[3%] gap-8 text-sm font-medium text-gray-700 border-t border-gray-200 py-3">
        <a href="#" class="hover:text-primary">Home</a>

        <div
          x-data="{ open: false }"
          @mouseenter="open = true"
          @mouseleave="open = false"
          class="relative">
          <button class="flex items-center gap-1">
            Our Offerings
            <i class="ri-arrow-down-s-line"></i>
          </button>

          <div
            x-show="open"
            x-transition
            class="absolute left-0 top-full mt-3 w-56 bg-[#002a53] rounded-lg shadow-lg">
            <a href="#" class="block px-4 py-3 hover:bg-[#004080]">Loans</a>
            <a href="#" class="block px-4 py-3 hover:bg-[#004080]">Mutual Funds</a>
            <a href="#" class="block px-4 py-3 hover:bg-[#004080]">Insurance</a>
            <a href="#" class="block px-4 py-3 hover:bg-[#004080]">Calculator</a>
          </div>
        </div>

        <a href="#" class="hover:text-primary">Blog</a>
        <a href="#" class="hover:text-primary">Reach Us</a>
      </nav>

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