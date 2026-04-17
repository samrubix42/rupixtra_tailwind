<footer class="bg-cyan-50">
    <div class="max-w-7xl mx-auto sm:px-6 py-12 sm:py-16">

        <!-- TOP FOOTER -->
        <div class="grid grid-cols-1 md:grid-cols-5 px-6 gap-8 md:gap-12">

            <!-- LOGO (FULL WIDTH ON MOBILE) -->
            <div class="col-span-1 md:col-span-1 flex justify-start md:justify-start">
                @php
                $siteLogo = setting('site_logo');
                $appName = setting('app_name', 'Rupixtra');
                @endphp
                <div class="flex flex-col gap-4 items-start">
                    <div>
                        <img
                            src="{{ $siteLogo ? asset('storage/'.$siteLogo) : asset('images/logo-light.png') }}"
                            class="h-14 md:h-16 max-w-full object-contain"
                            alt="{{ $appName }}">
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="{{ setting('social_linkedin', '#') }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#1f2937]
                                  flex items-center justify-center
                                  hover:opacity-80 transition">
                            <i class="ri-linkedin-fill text-primary"></i>
                        </a>
                        <a href="{{ setting('social_facebook', '#') }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#1f2937]
                                  flex items-center justify-center
                                  hover:opacity-80 transition">
                            <i class="ri-facebook-fill text-primary"></i>
                        </a>
                        <a href="{{ setting('social_twitter', '#') }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#1f2937]
                                  flex items-center justify-center
                                  hover:opacity-80 transition">
                            <i class="ri-twitter-x-line text-primary"></i>
                        </a>
                        <a href="{{ setting('social_instagram', '#') }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#1f2937]
                                  flex items-center justify-center
                                  hover:opacity-80 transition">
                            <i class="ri-instagram-line text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>




            <!-- COMPANY -->
            <div>
                <h4 class="text-sm md:text-lg font-semibold tracking-wide text-[#112b5e] mb-4 uppercase">
                    Company
                </h4>
                <ul class="space-y-2 md:space-y-3 text-sm text-zinc-500">
                    <li><a wire:navigate href="{{ route('home') }}" class="hover:text-[#112b5e]">Why {{ $appName }}?</a></li>
                    <li><a wire:navigate href="{{ route('our-story') }}" class="hover:text-[#112b5e]">About Us</a></li>
                    <li><a wire:navigate href="{{ route('reach-us') }}" class="hover:text-[#112b5e]">Contact</a></li>
                    <li><a wire:navigate href="{{ route('calculator') }}" class="hover:text-[#112b5e]">Calculator</a></li>
                </ul>
            </div>

            <!-- RESOURCES -->
            <div>
                <h4 class="text-sm md:text-lg font-semibold tracking-wide text-[#112b5e] mb-4 uppercase">
                    Resources
                </h4>
                <ul class="space-y-2 md:space-y-3 text-sm text-zinc-500">
                    <li><a wire:navigate href="{{ route('blog') }}" class="hover:text-[#112b5e]">Blog</a></li>
                    <li><a wire:navigate href="{{ route('services', ['slug' => 'personal-loan']) }}" class="hover:text-[#112b5e]">Personal Loan</a></li>
                    <li><a wire:navigate href="{{ route('services', ['slug' => 'business-loan']) }}" class="hover:text-[#112b5e]">Business Loan</a></li>
                    <li><a wire:navigate href="{{ route('services', ['slug' => 'home-loan']) }}" class="hover:text-[#112b5e]">Home Loan</a></li>
                    <li><a wire:navigate href="{{ route('services', ['slug' => 'lap']) }}" class="hover:text-[#112b5e]">LAP</a></li>
                </ul>
            </div>

            <!-- LEGAL -->
            <div>
                <h4 class="text-sm md:text-lg font-semibold tracking-wide text-[#112b5e] mb-4 uppercase">
                    Legal
                </h4>
                <ul class="space-y-2 md:space-y-3 text-sm text-zinc-500">
                    <li><a wire:navigate href="{{ route('privacy-policy') }}" class="hover:text-[#112b5e]">Privacy Policy</a></li>
                    <li><a wire:navigate href="{{ route('terms-and-conditions') }}" class="hover:text-[#112b5e]">Terms of Use</a></li>
                    <li><a wire:navigate href="{{ route('login') }}" class="hover:text-[#112b5e]">Admin Login</a></li>
                </ul>
            </div>

            <!-- SUPPORT -->
            <div>
                <h4 class="text-sm md:text-lg font-semibold tracking-wide text-[#112b5e] mb-4 uppercase">
                    Support
                </h4>
                <ul class="space-y-2 md:space-y-3 text-sm text-zinc-500">
                    <li class="flex items-start gap-3">
                        <i class="ri-map-pin-line text-[#112b5e] text-xl mt-1"></i>
                        <div>
                            <p class="text-sm text-zinc-500">Delhi NCR / Patna / Ranchi / Bangalore / Bhubaneswar</p>
                        </div>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="ri-phone-line text-[#112b5e] text-xl"></i>
                        <a href="tel:{{ setting('phone_number', '001-002-0040') }}" class="hover:underline">{{ setting('phone_number', '001-002-0040') }}</a>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="ri-mail-line text-[#112b5e] text-xl"></i>
                        <a href="mailto:{{ setting('contact_email', 'info@rupixtra.com') }}" class="hover:underline">{{ setting('contact_email', 'info@rupixtra.com') }}</a>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="ri-calendar-line text-[#112b5e] text-xl"></i>
                        <span>Monday – Saturday</span>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="ri-time-line text-[#112b5e] text-xl"></i>
                        <span>9 AM – 6 PM EST</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- DIVIDER -->
        <div class="mt-12 border-t border-zinc-200"></div>

        <!-- BOTTOM FOOTER -->
        <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-6">

            <p class="text-sm text-zinc-500 text-center md:text-left">
                {{ setting('footer_text', '© '.date('Y').' '.setting('company_name', 'Rupixtra').'. All Rights Reserved.') }}
            </p>

            <p>Powered by <a href="https://www.techonika.com/" target="_blank" rel="noopener noreferrer" class="text-blue font-bold hover:underline">Techonika</a></p>


        </div>

    </div>
</footer>