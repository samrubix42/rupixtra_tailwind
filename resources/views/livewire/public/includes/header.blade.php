<div class="bg-[#eefcfd]">
  <header class="hidden md:block border-b border-cyan-100">
    <div class="mx-auto py-5 flex items-center justify-between max-w-7xl px-4">

      <!-- LEFT: Logo -->
      <div class="flex items-center shrink-0">
        <img src="{{ asset('images/logo-light.png') }}" class="h-16" alt="Rupixtra">
      </div>

      <!-- MIDDLE: Navbar -->
      <div class="flex justify-center gap-8">
        <nav class="flex items-center gap-8 text-[15px] font-medium">

          <a wire:navigate href="{{ route('home') }}" class="text-zinc-700 tracking-wide hover:text-[#112b5e]">
            Home
          </a>

          <a wire:navigate href="{{ route('our-story') }}" class="text-zinc-700 tracking-wide hover:text-[#112b5e]">
            Our Story
          </a>

          <!-- Dropdown -->
          <div
            x-data="{ open: false }"
            @mouseenter="open = true"
            @mouseleave="open = false"
            class="relative">

            <button
              class="flex items-center gap-1.5 text-zinc-700 tracking-wide hover:text-[#112b5e]">

              Our Offering
              <i class="ri-arrow-down-s-line text-sm transition-transform"
                :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div
              x-show="open"
              x-transition.origin.top
              x-cloak
              class="absolute mt-4 left-0
                               w-56 bg-white  shadow-lg
                               border border-gray-100 z-50 overflow-hidden">

              <a href="#"
                class="block px-4 py-2.5 text-sm text-zinc-700
                                  hover:bg-cyan-50 hover:text-[#112b5e] transition">
                Personal Loan
              </a>

              <a href="#"
                class="block px-4 py-2.5 text-sm text-zinc-700
                                  hover:bg-cyan-50 hover:text-[#112b5e] transition">
                Business Loan
              </a>

              <a href="#"
                class="block px-4 py-2.5 text-sm text-zinc-700
                                  hover:bg-cyan-50 hover:text-[#112b5e] transition">
                Home Loan
              </a>

              <a href="#"
                class="block px-4 py-2.5 text-sm text-zinc-700
                                  hover:bg-cyan-50 hover:text-[#112b5e] transition">
                LAP
              </a>

              <a href="#"
                class="block px-4 py-2.5 text-sm text-zinc-700
                                  hover:bg-cyan-50 hover:text-[#112b5e] transition">
                Credit Card
              </a>
            </div>
          </div>

          <a wire:navigate href="{{ route('calculator') }}" class="text-zinc-700 tracking-wide hover:text-[#112b5e]">
            Calculator
          </a>

          <a wire:navigate href="{{ route('blog') }}" class="text-zinc-700 tracking-wide hover:text-[#112b5e]">
            Blog
          </a>

          <a wire:navigate href="{{ route('reach-us') }}" class="text-zinc-700 tracking-wide hover:text-[#112b5e]">
            Reach Us
          </a>
        </nav>

        <div
          x-data="{ open: false }"
          @click.outside="open = false"
          class="relative mt-1">
          <input
            type="text"
            placeholder="Search..."
            @focus="open = true"
            class="bg-[#eefcfd] border border-gray-400 rounded-full
               pl-5 pr-12 py-2 text-sm
               focus:outline-none focus:ring-2 focus:ring-[#112b5e]
               transition-all duration-300 ease-in-out
               w-36"
            :class="open ? 'w-64' : ''" />

          <i
            class="ri-search-line absolute right-4 top-1/2 -translate-y-1/2
               text-gray-500 cursor-pointer"
            @click="open = true"></i>
        </div>

      </div>

    </div>
  </header>




  <header x-data="{ open: false, offerings: false }"
    class="md:hidden border-b border-cyan-100 bg-[#eefcfd]">

    <!-- TOP BAR -->
    <div class="px-4 pt-4 pb-3">
      <div class="flex items-center justify-between">
        <img src="{{ asset('images/logo-light.png') }}" class="h-12" />

        <button @click="open = true">
          <i class="ri-menu-3-line text-2xl text-slate-700"></i>
        </button>
      </div>

      <!-- SEARCH (below logo) -->
      <div class="relative mt-4">
        <input
          type="text"
          placeholder="Search..."
          class="w-full bg-[#eefcfd] border border-gray-400 rounded-full
                       pl-5 pr-12 py-2.5 text-sm
                       focus:outline-none focus:ring-2 focus:ring-[#112b5e]" />

        <i class="ri-search-line absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
      </div>
    </div>

    <!-- FULLSCREEN MENU -->
    <div
      x-show="open"
      x-transition.opacity
      x-cloak
      class="fixed inset-0 bg-cyan z-50">

      <!-- MENU HEADER -->
      <div class="flex items-center justify-between px-4 py-4 ">
        <img src="{{ asset('images/logo-light.png') }}" class="h-12">
        <button @click="open = false">
          <i class="ri-close-line text-2xl text-slate-700"></i>
        </button>
      </div>

      <!-- MENU LINKS -->
      <nav class="px-6 py-6 space-y-6 text-base font-medium text-slate-700">

        <a wire:navigate href="{{ route('home') }}" class="block tracking-wide hover:text-[#112b5e]">Home</a>

        <a wire:navigate href="{{ route('our-story') }}" class="block tracking-wide hover:text-[#112b5e]">
          Our Story
        </a>

        <!-- DROPDOWN -->
        <div>
          <button
            @click="offerings = !offerings"
            class="flex items-center justify-between w-full tracking-wide hover:text-[#112b5e]">
            Our Offering
            <i :class="offerings ? 'ri-arrow-up-s-line' : 'ri-arrow-down-s-line'"></i>
          </button>

          <div
            x-show="offerings"
            x-transition
            class="mt-3 ml-4 space-y-3 text-sm text-slate-600">

            <a href="#" class="block">Personal Loan</a>
            <a href="#" class="block">Business Loan</a>
            <a href="#" class="block">Home Loan</a>
            <a href="#" class="block">LAP</a>
            <a href="#" class="block">Credit Card</a>
          </div>
        </div>

        <a wire:navigate href="{{ route('calculator') }}" class="block tracking-wide hover:text-[#112b5e]">
          Calculator
        </a>

        <a wire:navigate href="{{ route('blog') }}" class="block tracking-wide hover:text-[#112b5e]">
          Blog
        </a>

        <a wire:navigate href="{{ route('reach-us') }}" class="block tracking-wide hover:text-[#112b5e]">
          Reach Us
        </a>
      </nav>
    </div>
  </header>


</div>