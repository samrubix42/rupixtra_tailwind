<div>
   <section class="bg-white py-10">
  <div class="mx-auto px-[3%] flex justify-center">

    <!-- Categories Grid -->
    <div
      class="grid grid-cols-3 gap-y-7 gap-x-12
             sm:grid-cols-4
             md:grid-cols-5
             lg:grid-cols-6
             justify-items-center max-w-5xl"
    >

      <!-- Item -->
      <a href="#" class="flex items-center flex-col justify-center text-center group">
        <div
          class="h-14 w-14 sm:h-16 sm:w-16 md:h-20 md:w-20
                 rounded-xl bg-zinc-100
                 flex items-center justify-center
                 shadow-sm transition
                 group-hover:shadow-md group-hover:-translate-y-0.5"
        >
          <img src="{{ asset('icons/assets.png') }}" class="h-6 w-6 md:h-9 md:w-9" />
        </div>
        <p class="mt-2 text-[11px] sm:text-xs font-medium text-gray-700">
          LAP
        </p>
      </a>

      <a href="#" class="flex items-center flex-col justify-center text-center group">
        <div class="h-14 w-14 sm:h-16 sm:w-16 md:h-20 md:w-20 rounded-xl bg-zinc-100 flex items-center justify-center shadow-sm transition group-hover:shadow-md group-hover:-translate-y-0.5">
          <img src="{{ asset('icons/house.png') }}" class="h-6 w-6 md:h-9 md:w-9" />
        </div>
        <p class="mt-2 text-[11px] sm:text-xs font-medium text-gray-700">
            Home Loan
        </p>
      </a>

      <a href="#" class="flex items-center flex-col justify-center text-center group">
        <div class="h-14 w-14 sm:h-16 sm:w-16 md:h-20 md:w-20 rounded-xl bg-zinc-100 flex items-center justify-center shadow-sm transition group-hover:shadow-md group-hover:-translate-y-0.5">
          <img src="{{ asset('icons/loan.png') }}" class="h-6 w-6 md:h-9 md:w-9" />
        </div>
        <p class="mt-2 text-[11px] sm:text-xs font-medium text-gray-700">
          Bussiness Loan
        </p>
      </a>

      <a href="#" class="flex items-center flex-col justify-center text-center group">
        <div class="h-14 w-14 sm:h-16 sm:w-16 md:h-20 md:w-20 rounded-xl bg-zinc-100 flex items-center justify-center shadow-sm transition group-hover:shadow-md group-hover:-translate-y-0.5">
          <img src="{{ asset('icons/manager.png') }}" class="h-6 w-6 md:h-9 md:w-9" />
        </div>
        <p class="mt-2 text-[11px] sm:text-xs text font-medium text-gray-700">
          Self Employed Loan
        </p>
      </a>

      <a href="#" class="flex items-center flex-col justify-center text-center group">
        <div class="h-14 w-14 sm:h-16 sm:w-16 md:h-20 md:w-20 rounded-xl bg-zinc-100 flex items-center justify-center shadow-sm transition group-hover:shadow-md group-hover:-translate-y-0.5">
          <img src="{{ asset('icons/personal.png') }}" class="h-6 w-6 md:h-9 md:w-9" />
        </div>
        <p class="mt-2 text-[11px] sm:text-xs font-medium text-gray-700">
          Personal Loan
        </p>
      </a>

    </div>

  </div>
</section>

    <section class="bg-zinc-50 py-2">
        <div
            wire:ignore
            x-data
            x-init="
      setTimeout(() => {
        new Swiper($refs.slider, {
          loop: true,
          speed: 800,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
        });
      }, 100);
    "
            class="mx-auto px-[3%]">
            <div
                class="swiper rounded-2xl overflow-hidden shadow-md"
                x-ref="slider">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <img
                            src="https://picsum.photos/id/1015/1400/600"
                            class="w-full h-[180px] sm:h-[260px] md:h-[360px] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img
                            src="https://picsum.photos/id/1016/1400/600"
                            class="w-full h-[180px] sm:h-[260px] md:h-[360px] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img
                            src="https://picsum.photos/id/1018/1400/600"
                            class="w-full h-[180px] sm:h-[260px] md:h-[360px] object-cover">
                    </div>

                    <div class="swiper-slide">
                        <img
                            src="https://picsum.photos/id/1020/1400/600"
                            class="w-full h-[180px] sm:h-[260px] md:h-[360px] object-cover">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-2">
        <div class="mx-auto px-[3%]">

            <!-- Cards Wrapper -->
            <div
                class="flex gap-4 overflow-x-auto pb-2
             md:grid md:grid-cols-4 md:gap-6 md:overflow-visible">

                <!-- Card -->
                <a href="#"
                    class="flex-shrink-0 w-[220px] md:w-auto
                rounded-2xl overflow-hidden
                shadow-sm hover:shadow-md transition group">
                    <div class="relative h-[280px]">
                        <img
                            src="https://picsum.photos/id/1011/600/800"
                            class="w-full h-full object-cover group-hover:scale-105 transition">

                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>

                        <!-- Text -->
                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <h3 class="text-sm font-semibold leading-tight">
                                Personal Loan
                            </h3>
                            <p class="text-xs opacity-90">
                                Funds up to ₹55 Lakh
                            </p>
                        </div>
                    </div>
                </a>

                <!-- Card -->
                <a href="#"
                    class="flex-shrink-0 w-[220px] md:w-auto
                rounded-2xl overflow-hidden
                shadow-sm hover:shadow-md transition group">
                    <div class="relative h-[280px]">
                        <img
                            src="https://picsum.photos/id/1012/600/800"
                            class="w-full h-full object-cover group-hover:scale-105 transition">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <h3 class="text-sm font-semibold">
                                Fixed Deposit
                            </h3>
                            <p class="text-xs opacity-90">
                                Up to 7.30% p.a.
                            </p>
                        </div>
                    </div>
                </a>

                <!-- Card -->
                <a href="#"
                    class="flex-shrink-0 w-[220px] md:w-auto
                rounded-2xl overflow-hidden
                shadow-sm hover:shadow-md transition group">
                    <div class="relative h-[280px]">
                        <img
                            src="https://picsum.photos/id/1013/600/800"
                            class="w-full h-full object-cover group-hover:scale-105 transition">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <h3 class="text-sm font-semibold">
                                Insta EMI Card
                            </h3>
                            <p class="text-xs opacity-90">
                                Limit up to ₹3 Lakh
                            </p>
                        </div>
                    </div>
                </a>

                <!-- Card -->
                <a href="#"
                    class="flex-shrink-0 w-[220px] md:w-auto
                rounded-2xl overflow-hidden
                shadow-sm hover:shadow-md transition group">
                    <div class="relative h-[280px]">
                        <img
                            src="https://picsum.photos/id/1014/600/800"
                            class="w-full h-full object-cover group-hover:scale-105 transition">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <h3 class="text-sm font-semibold">
                                Washing Machines
                            </h3>
                            <p class="text-xs opacity-90">
                                EMI starting ₹999*
                            </p>
                        </div>
                    </div>
                </a>

            </div>

        </div>
    </section>


</div>