<div>
    <style>
        .shadow-card {
            box-shadow: 6px 7px 10px -1px rgba(76, 62, 62, 0.75);
            -webkit-box-shadow: 6px 7px 10px -1px rgba(76, 62, 62, 0.75);
            -moz-box-shadow: 6px 7px 10px -1px rgba(76, 62, 62, 0.75);
        }
    </style>

    <!-- desktop hero section -->
    <section class="relative hidden md:block overflow-hidden bg-cyan">

        <!-- BACKGROUND PATTERN -->
        <div
            class="absolute inset-0 bg-no-repeat bg-left bg-contain"
            style="background-image: url('{{ asset('images/hero-bg.png') }}');">
        </div>

        <div class="relative max-w-7xl mx-auto px-10 py-14
                grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

            <!-- LEFT CONTENT -->
            <div>
                <h1 class="text-5xl md:text-[80px] font-extrabold leading-tight text-blue">
                    More <span class="text-dark-cyan">Options.</span><br>
                    More <span class="text-dark-cyan">You.</span>
                </h1>

                <h2 class="mt-8 text-4xl font-semibold text-blue">
                    Compare Loans Online
                </h2>

                <p class="mt-3 text-3xl font-bold text-dark-cyan">
                    50% faster
                </p>

                <p class="mt-6 max-w-lg text-sm leading-relaxed text-zinc-600">
                    We understand that finding the right loan can be overwhelming.
                    That’s why we’re here to help simplify the process.
                </p>

                <!-- CTA BUTTONS -->
                <div class="mt-10 flex gap-4">

                    <a href="#"
                        class="font-bold px-8 py-3
                          bg-dark-cyan text-blue
                          hover:opacity-90 transition">
                        READ MORE
                    </a>

                    <a href="#"
                        class="font-bold px-8 py-3 border-2
                          border-dark-cyan text-dark-cyan
                        ">
                        CALL NOW
                    </a>
                </div>
            </div>

            <!-- RIGHT IMAGE (MOVED DOWN CLEANLY) -->
            <div class="relative mt-12 lg:mt-20">
                <img
                    src="{{ asset('images/hero-img.png') }}"
                    alt="Loan Consultation"
                    class="w-full object-contain">
            </div>

        </div>
    </section>


    <!-- mobile hero section -->
    <section
        class="relative md:hidden bg-cyan overflow-hidden">

        <!-- BACKGROUND IMAGE -->
        <div
            class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ asset('images/hero-mobile.jpg') }}');">
        </div>

        <!-- OVERLAY (for text readability) -->
        <div class="absolute inset-0 bg-cyan/80"></div>

        <!-- CONTENT -->
        <div class="relative px-6 py-20">

            <h1 class="text-5xl font-extrabold leading-tight text-blue">
                More <span class="text-dark-cyan">Options.</span><br>
                More <span class="text-dark-cyan">You.</span>
            </h1>

            <h2 class="mt-6 text-3xl font-semibold text-blue">
                Compare Loans Online
            </h2>

            <p class="mt-2 text-3xl font-bold text-dark-cyan">
                50% faster
            </p>

            <p class="mt-5 max-w-md text-normal leading-relaxed text-zinc-700">
                We understand that finding the right loan can be overwhelming.
                That’s why we’re here to help simplify the process.
            </p>

            <!-- CTA BUTTONS -->
            <div class="mt-8 flex gap-4">

                <a href="#"
                    class="text-center font-bold px-6 py-3 
                      bg-dark-cyan text-blue hover:opacity-90 transition">
                    READ MORE
                </a>

                <a href="#"
                    class="text-center font-bold px-6 py-3 border-2
                      border-dark-cyan text-dark-cyan
                      hover:bg-dark-cyan hover:text-blue transition">
                    CALL NOW
                </a>

            </div>
        </div>
    </section>


    <!-- serivce -->
    <section class="bg-cyan py-12 sm:py-14 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            <!-- HEADER -->
            <div class="max-w-4xl px-2 sm:px-6 lg:px-4">
                <span class="text-dark-cyan font-bold tracking-widest uppercase
                         text-lg sm:text-xl lg:text-2xl">
                    What we do
                </span>

                <!-- underline -->
                <div class="w-14 sm:w-16 lg:w-18 h-1 sm:h-1.5 bg-zinc-700 rounded
                        mt-2 mb-4 sm:mb-6"></div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl
                       font-bold text-blue mb-4 sm:mb-6">
                    Our services.
                </h2>

                <h3 class="text-xl sm:text-2xl lg:text-3xl
                       font-semibold text-blue mb-2">
                    Your Trusted Guide to Finding the Perfect Loan
                </h3>

                <p class="text-gray-700 text-base sm:text-lg lg:text-xl
                      font-medium leading-relaxed">
                    We provide clear, step-by-step assistance tailored to your unique
                    financial needs, ensuring that you find the perfect loan with confidence.
                </p>
            </div>

            <!-- SERVICES GRID -->
            <div class="mt-12 sm:mt-16 lg:mt-20
                    grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-6
                    gap-4 sm:gap-6 lg:gap-10">

                <!-- CARD TEMPLATE -->
                <!-- LAP -->
                <div class="flex flex-col items-center">
                    <div class="w-28 h-28 sm:w-32 sm:h-32 lg:w-44 lg:h-44
                            rounded-full bg-dark-cyan
                            flex flex-col items-center justify-center gap-1 sm:gap-2
                            shadow-card">
                        <img src="{{ asset('Icons/building-svgrepo-com.png') }}"
                            alt="LAP"
                            class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 object-contain">
                        <span class="text-white text-[10px] sm:text-xs lg:text-sm
                                 font-medium tracking-wide text-center">
                            LAP
                        </span>
                    </div>
                </div>

                <!-- Home Loan -->
                <div class="flex flex-col items-center">
                    <div class="w-28 h-28 sm:w-32 sm:h-32 lg:w-44 lg:h-44
                            rounded-full bg-dark-cyan shadow-xl
                            flex flex-col items-center justify-center gap-1 shadow-card sm:gap-2">
                        <img src="{{ asset('Icons/home-svgrepo-com.png') }}"
                            class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12">
                        <span class="text-white text-[10px] sm:text-xs lg:text-sm
                                 font-medium text-center">
                            Home Loan
                        </span>
                    </div>
                </div>

                <!-- Business Loan -->
                <div class="flex flex-col items-center">
                    <div class="w-28 h-28 sm:w-32 sm:h-32 lg:w-44 lg:h-44
                            rounded-full bg-dark-cyan shadow-xl
                            flex flex-col items-center justify-center shadow-card gap-1 sm:gap-2">
                        <img src="{{ asset('Icons/business-svgrepo-com.png') }}"
                            class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12">
                        <span class="text-white text-[10px] sm:text-xs lg:text-sm
                                 font-medium text-center">
                            Business Loan
                        </span>
                    </div>
                </div>

                <!-- Self Employed -->
                <div class="flex flex-col items-center">
                    <div class="w-28 h-28 sm:w-32 sm:h-32 lg:w-44 lg:h-44
                            rounded-full bg-dark-cyan shadow-xl
                            flex flex-col items-center justify-center shadow-card gap-1 sm:gap-2">
                        <img src="{{ asset('Icons/employee-svgrepo-com.png') }}"
                            class="w-auto h-8 sm:w-10 sm:h-10 lg:w-auto lg:h-12">
                        <span class="text-white text-[10px]  sm:text-xs lg:text-sm
                                 font-medium text-center">
                            Self Employed
                        </span>
                    </div>
                </div>

                <!-- Personal Loan -->
                <div class="flex flex-col items-center">
                    <div class="w-28 h-28 sm:w-32 sm:h-32 lg:w-44 lg:h-44
                            rounded-full bg-dark-cyan shadow-xl
                            flex flex-col items-center shadow-card justify-center gap-1 sm:gap-2">
                        <img src="{{ asset('Icons/admin-users-svgrepo-com.png') }}"
                            class="w-9 h-9 sm:w-10 sm:h-10 lg:w-13 lg:h-13">
                        <span class="text-white text-[10px] sm:text-xs lg:text-sm
                                 font-medium text-center">
                            Personal Loan
                        </span>
                    </div>
                </div>

                <!-- Credit Card -->
                <div class="flex flex-col items-center">
                    <div class="w-28 h-28 sm:w-32 sm:h-32 lg:w-44 lg:h-44
                            rounded-full bg-dark-cyan
                            flex flex-col items-center shadow-card justify-center gap-1 sm:gap-2
                            shadow-card">
                        <img src="{{ asset('Icons/credit-card-svgrepo-com.png') }}"
                            alt="Credit Card"
                            class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 object-contain">
                        <span class="text-white text-[10px] sm:text-xs lg:text-sm
                                 font-medium tracking-wide text-center">
                            Credit Card
                        </span>
                    </div>
                </div>

            </div>

        </div>
    </section>



    <section
        class="bg-cyan py-12 sm:py-14 lg:py-12"
        x-data="offersSlider()"
        x-init="init()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            <!-- HEADER -->
            <div class="max-w-3xl mb-12 sm:mb-16 px-2 sm:px-4">
                <span class="text-dark-cyan font-bold tracking-widest uppercase text-lg sm:text-xl lg:text-2xl">
                    Offers
                </span>

                <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-blue">
                    What’s new?
                </h2>
            </div>

            <!-- SLIDER -->
            <div
                class="overflow-hidden"
                @mouseenter="pause()"
                @mouseleave="play()">
                <div
                    class="flex transition-transform duration-700 ease-in-out"
                    :style="`transform: translateX(-${current * (100 / perView)}%)`">

                    <!-- SLIDE -->
                    <template x-for="(item, i) in offers" :key="i">
                        <div class="w-full sm:w-1/2 lg:w-1/4 px-2 sm:px-3 shrink-0">
                            <div class="relative overflow-hidden group">

                                <!-- IMAGE -->
                                <img
                                    :src="item.image"
                                    alt="Offer"
                                    class="w-full h-[240px] sm:h-[280px] lg:h-[320px]
                                       object-cover transition-transform duration-500
                                       group-hover:scale-105">

                                <!-- DATE -->
                                <span class="absolute top-4 left-4 bg-black/60
                                         text-white text-xs px-3 py-1">
                                    <span x-text="item.date"></span>
                                </span>

                                <!-- TEXT OVERLAY -->
                                <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-5
                                        bg-gradient-to-t from-black/70 to-transparent">
                                    <h4 class="text-white text-base sm:text-lg font-semibold leading-snug"
                                        x-text="item.title">
                                    </h4>
                                </div>

                            </div>
                        </div>
                    </template>

                </div>
            </div>

            <!-- DOTS -->
            <div class="flex justify-center gap-3 mt-10 sm:mt-12">
                <template x-for="i in totalDots" :key="i">
                    <button
                        @click="goTo(i - 1)"
                        class="w-3 h-3 rounded-full border border-blue transition"
                        :class="current === i - 1 ? 'bg-blue' : ''">
                    </button>
                </template>
            </div>

        </div>
    </section>

    <script>
        function offersSlider() {
            return {
                current: 0,
                interval: null,
                perView: 4,

                offers: [{
                        image: "{{ asset('images/Group 87.png') }}",
                        date: "26TH APRIL 2025",
                        title: "Duis aute irure dolor in",
                    },
                    {
                        image: "{{ asset('images/Group 87.png') }}",
                        date: "16TH APRIL 2025",
                        title: "Lorem ipsum dolor sit",
                    },
                    {
                        image: "{{ asset('images/Group 87.png') }}",
                        date: "26TH APRIL 2025",
                        title: "Duis aute irure dolor in",
                    },
                    {
                        image: "{{ asset('images/Group 87.png') }}",
                        date: "16TH APRIL 2025",
                        title: "Lorem ipsum dolor sit",
                    },
                    {
                        image: "{{ asset('images/Group 87.png') }}",
                        date: "26TH APRIL 2025",
                        title: "Duis aute irure dolor in",
                    },
                ],

                get totalDots() {
                    return this.offers.length - this.perView + 1
                },

                init() {
                    this.updatePerView()
                    window.addEventListener('resize', () => this.updatePerView())
                    this.play()
                },

                updatePerView() {
                    if (window.innerWidth < 640) {
                        this.perView = 1
                    } else if (window.innerWidth < 1024) {
                        this.perView = 2
                    } else {
                        this.perView = 4
                    }
                },

                play() {
                    this.interval = setInterval(() => {
                        this.next()
                    }, 3000)
                },

                pause() {
                    clearInterval(this.interval)
                },

                next() {
                    if (this.current >= this.totalDots - 1) {
                        this.current = 0
                    } else {
                        this.current++
                    }
                },

                goTo(index) {
                    this.current = index
                }
            }
        }
    </script>


    <section
        class="bg-cyan py-12 sm:py-14 lg:py-12"
        x-data="testimonialSlider()"
        x-init="init()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            <!-- HEADER -->
            <div class="max-w-3xl mb-8 sm:mb-12 lg:mb-16 px-2 sm:px-3">
                <span class="text-dark-cyan font-bold tracking-widest uppercase
                         text-base sm:text-xl lg:text-2xl">
                    Testimonials
                </span>

                <div class="w-14 sm:w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-4 sm:mb-6"></div>

                <h2 class="text-2xl sm:text-4xl lg:text-5xl font-bold text-blue">
                    Client's Testimonials
                </h2>
            </div>

            <!-- SLIDER -->
            <div
                class="overflow-hidden"
                @mouseenter="pause()"
                @mouseleave="play()">
                <div
                    class="flex transition-transform duration-700 ease-in-out"
                    :style="`transform: translateX(-${current * (100 / perView)}%)`">

                    <!-- SLIDE -->
                    <template x-for="(item, i) in testimonials" :key="i">
                        <div
                            class="w-full sm:w-1/2 lg:w-1/3 px-2 sm:px-3 shrink-0">
                            <div class="bg-[#abeef3] p-6 sm:p-8 min-h-[180px]
                                    flex flex-col justify-between ">

                                <div>
                                    <h4 class="text-base sm:text-lg font-bold text-blue">
                                        A.M Bose
                                    </h4>

                                    <p class="text-xs sm:text-sm font-semibold text-blue mt-1">
                                        Lorem ipsum dolem
                                    </p>

                                    <p class="text-xs sm:text-sm text-blue/80 mt-3 leading-relaxed">
                                        Lorem ipsum dolem Lorem ipsum dolem
                                    </p>
                                </div>

                                <!-- STARS -->
                                <div class="flex gap-1 mt-4">
                                    <template x-for="n in 5">
                                        <svg
                                            class="w-4 h-4"
                                            :class="n <= item.rating ? 'text-blue' : 'text-white/50'"
                                            fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967h4.175c.969 0 1.371 1.24.588 1.81l-3.379 2.455 1.287 3.966c.3.922-.755 1.688-1.54 1.118L10 13.347l-3.368 2.456c-.784.57-1.838-.196-1.539-1.118l1.287-3.966-3.38-2.455c-.783-.57-.38-1.81.588-1.81h4.176L9.05 2.927z" />
                                        </svg>
                                    </template>
                                </div>

                            </div>
                        </div>
                    </template>

                </div>
            </div>

            <!-- DOTS -->
            <div class="flex justify-center gap-3 mt-8 sm:mt-10">
                <template x-for="i in totalDots" :key="i">
                    <button
                        @click="goTo(i - 1)"
                        class="w-3 h-3 rounded-full border border-blue transition"
                        :class="current === i - 1 ? 'bg-blue' : ''">
                    </button>
                </template>
            </div>

        </div>
    </section>

    <script>
        function testimonialSlider() {
            return {
                current: 0,
                interval: null,
                perView: 3,

                testimonials: [{
                        rating: 3
                    },
                    {
                        rating: 4
                    },
                    {
                        rating: 5
                    },
                    {
                        rating: 4
                    },
                    {
                        rating: 5
                    },
                ],

                get totalDots() {
                    return this.testimonials.length - this.perView + 1
                },

                init() {
                    this.updatePerView()
                    window.addEventListener('resize', () => this.updatePerView())
                    this.play()
                },

                updatePerView() {
                    if (window.innerWidth < 640) {
                        this.perView = 1 // mobile
                    } else if (window.innerWidth < 1024) {
                        this.perView = 2 // tablet
                    } else {
                        this.perView = 3 // desktop
                    }
                    this.current = 0
                },

                play() {
                    this.interval = setInterval(() => {
                        this.next()
                    }, 3000)
                },

                pause() {
                    clearInterval(this.interval)
                },

                next() {
                    if (this.current >= this.totalDots - 1) {
                        this.current = 0
                    } else {
                        this.current++
                    }
                },

                goTo(index) {
                    this.current = index
                }
            }
        }
    </script>



    <section class="bg-cyan py-10 sm:py-14 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            <!-- HEADER (ALWAYS LEFT ALIGNED) -->
            <div class="max-w-3xl mb-8 sm:mb-12 lg:mb-16 px-2 sm:px-4">

                <span class="text-dark-cyan font-bold tracking-widest uppercase
                         text-base sm:text-xl lg:text-2xl">
                    Blog
                </span>

                <div class="w-12 sm:w-16 h-1.5 bg-zinc-700 rounded
                        mt-2 mb-4 sm:mb-6"></div>

                <h2 class="text-2xl sm:text-4xl lg:text-5xl
                       font-bold text-blue leading-tight">
                    What’s new?
                    <br class="hidden sm:block">
                    Our blog and news.
                </h2>
            </div>

            <!-- BLOG GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4
                    gap-5 sm:gap-8">

                <!-- CARD -->
                <div class="group relative overflow-hidden">
                    <img
                        src="{{ asset('images/Group 87.png') }}"
                        alt="Blog"
                        class="w-full h-[200px] sm:h-[280px] lg:h-[320px]
                           object-cover transition-transform duration-500
                           group-hover:scale-105">

                    <!-- DATE -->
                    <span class="absolute top-3 left-3 sm:top-4 sm:left-4
                             bg-black/60 text-white
                             text-[10px] sm:text-xs
                             px-2 sm:px-3 py-1">
                        26TH APRIL 2025
                    </span>

                    <!-- TEXT OVERLAY -->
                    <div class="absolute bottom-0 left-0 right-0
                            p-3 sm:p-5
                            bg-gradient-to-t from-black/70 to-transparent">
                        <h4 class="text-white
                               text-sm sm:text-base lg:text-lg
                               font-semibold leading-snug">
                            Duis aute irure dolor in
                        </h4>
                    </div>
                </div>

                <!-- CARD -->
                <div class="group relative overflow-hidden">
                    <img
                        src="{{ asset('images/Group 87.png') }}"
                        alt="Blog"
                        class="w-full h-[200px] sm:h-[280px] lg:h-[320px]
                           object-cover transition-transform duration-500
                           group-hover:scale-105">

                    <span class="absolute top-3 left-3 sm:top-4 sm:left-4
                             bg-black/60 text-white
                             text-[10px] sm:text-xs
                             px-2 sm:px-3 py-1">
                        16TH APRIL 2025
                    </span>

                    <div class="absolute bottom-0 left-0 right-0
                            p-3 sm:p-5
                            bg-gradient-to-t from-black/70 to-transparent">
                        <h4 class="text-white
                               text-sm sm:text-base lg:text-lg
                               font-semibold leading-snug">
                            Lorem ipsum dolor sit
                        </h4>
                    </div>
                </div>

                <!-- CARD -->
                <div class="group relative overflow-hidden">
                    <img
                        src="{{ asset('images/Group 87.png') }}"
                        alt="Blog"
                        class="w-full h-[200px] sm:h-[280px] lg:h-[320px]
                           object-cover transition-transform duration-500
                           group-hover:scale-105">

                    <span class="absolute top-3 left-3 sm:top-4 sm:left-4
                             bg-black/60 text-white
                             text-[10px] sm:text-xs
                             px-2 sm:px-3 py-1">
                        26TH APRIL 2025
                    </span>

                    <div class="absolute bottom-0 left-0 right-0
                            p-3 sm:p-5
                            bg-gradient-to-t from-black/70 to-transparent">
                        <h4 class="text-white
                               text-sm sm:text-base lg:text-lg
                               font-semibold leading-snug">
                            Duis aute irure dolor in
                        </h4>
                    </div>
                </div>

                <!-- CARD -->
                <div class="group relative overflow-hidden">
                    <img
                        src="{{ asset('images/Group 87.png') }}"
                        alt="Blog"
                        class="w-full h-[200px] sm:h-[280px] lg:h-[320px]
                           object-cover transition-transform duration-500
                           group-hover:scale-105">

                    <span class="absolute top-3 left-3 sm:top-4 sm:left-4
                             bg-black/60 text-white
                             text-[10px] sm:text-xs
                             px-2 sm:px-3 py-1">
                        16TH APRIL 2025
                    </span>

                    <div class="absolute bottom-0 left-0 right-0
                            p-3 sm:p-5
                            bg-gradient-to-t from-black/70 to-transparent">
                        <h4 class="text-white
                               text-sm sm:text-base lg:text-lg
                               font-semibold leading-snug">
                            Lorem ipsum dolor sit
                        </h4>
                    </div>
                </div>

            </div>

            <!-- EXPLORE MORE -->
            <div class="mt-8 sm:mt-14 px-2 sm:px-4">
                <a href="#"
                    class="inline-flex items-center
                      text-base sm:text-xl lg:text-2xl
                      underline gap-2 sm:gap-3
                      text-dark-cyan font-semibold
                      hover:gap-4 transition-all">
                    Explore more
                    <span class="block w-6 sm:w-10 h-[2px] bg-dark-cyan"></span>
                </a>
            </div>

        </div>
    </section>

    <section class="bg-dark-cyan py-20">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- LEFT CONTENT -->
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-blue leading-tight">
                        Connect us to get the<br>
                        great deals.
                    </h2>

                    <p class="mt-6 max-w-lg text-blue/80">
                        Duis aute irure dolor in reprehenderit in<br>
                        voluptate velit esse cillum
                    </p>
                </div>

                <!-- RIGHT FORM -->
                <div class="flex flex-col sm:flex-row gap-6 sm:items-center">

                    <!-- EMAIL INPUT -->
                    <input
                        type="email"
                        placeholder="Enter your email address"
                        class="w-full sm:w-[320px] bg-transparent
                           border-2 border-blue
                           px-6 py-4 text-blue
                           placeholder:text-blue/70
                           focus:outline-none focus:ring-0">

                    <!-- BUTTON -->
                    <button
                        class="bg-[#1f2233] text-white
                           px-10 py-4 text-lg font-semibold
                           tracking-wide hover:opacity-90 transition">
                        CONNECT US
                    </button>

                </div>

            </div>

        </div>
    </section>









</div>