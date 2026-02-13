<div>
    <section class="bg-cyan py-12 sm:py-20">

        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">
                <div class="lg:col-span-7">


                    <!-- LEFT CONTENT -->
                    <div class=" bg-[#bfe3e6] rounded-[30px] p-6 sm:p-8 lg:p-10 shadow-lg">

                        <h2 class="text-3xl lg:text-4xl font-semibold text-blue mb-6">
                            {{ $service->title }}
                        </h2>

                        <div class="text-blue/80 leading-relaxed space-y-4 prose prose-sm max-w-none prose-p:mb-0">
                            {!! $service->primary_section !!}
                        </div>

                    </div>
                    <section class=" py-10 sm:py-16">

                        <div class="max-w-4xl mx-auto space-y-10 sm:space-y-12">

                            <!-- HOME LOAN FEATURES -->
                            <div class="bg-gray-200 rounded-[30px] p-6 sm:p-8 lg:p-10 shadow-lg">
                                @php
                                $secondary = $service->secondary_sections[0] ?? null;
                                $secondaryItems = $secondary['items'] ?? [];
                                @endphp

                                <h2 class="text-3xl font-semibold text-blue mb-6">
                                    {{ $secondary['title'] ?? 'Key Features' }}
                                </h2>

                                @if(!empty($secondaryItems))
                                <ul class="space-y-4 text-blue/90 leading-relaxed">
                                    @foreach($secondaryItems as $item)
                                    <li class="flex items-start gap-3">
                                        <span class="mt-2 w-2 h-2 bg-[#2e2a7b] rounded-full"></span>
                                        <span>
                                            @if(!empty($item['key']))
                                            <strong>{{ $item['key'] }}:</strong>
                                            @endif
                                            {{ $item['value'] ?? '' }}
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <p class="text-blue/80 leading-relaxed">
                                    Detailed highlights for this service will be available soon.
                                </p>
                                @endif

                            </div>

                            <!-- HOW TO APPLY -->
                            <div class="bg-[#bfe3e6] rounded-[30px] p-6 sm:p-8 lg:p-10 shadow-lg">
                                @php
                                $tertiary = $service->tertiary_sections[0] ?? null;
                                $tertiaryItems = $tertiary['items'] ?? [];
                                @endphp

                                <h2 class="text-3xl font-semibold text-blue mb-6">
                                    {{ $tertiary['title'] ?? 'How this service helps you' }}
                                </h2>

                                @if(!empty($tertiary['description']))
                                <p class="text-blue/80 leading-relaxed mb-6">
                                    {{ $tertiary['description'] }}
                                </p>
                                @endif

                                @if(!empty($tertiaryItems))
                                <ul class="space-y-4 text-blue/90 leading-relaxed">
                                    @foreach($tertiaryItems as $item)
                                    <li class="flex gap-2">
                                        <span class="font-semibold text-blue">{{ $loop->iteration }}.</span>
                                        <span>
                                            @if(!empty($item['key']))
                                            <strong>{{ $item['key'] }}:</strong>
                                            @endif
                                            {{ $item['value'] ?? '' }}
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif

                            </div>

                        </div>

                    </section>

                </div>



                <!-- RIGHT SIDE -->
                <div class="lg:col-span-5 space-y-8 mt-8 lg:mt-0">

                    <!-- IMAGE CARD -->
                    <div class="p-4 sm:p-6 lg:p-8 flex justify-center">
                        @if($service->featured_image)
                        <img src="{{ asset('storage/' . $service->featured_image) }}"
                            alt="{{ $service->title }}"
                            class="w-full max-w-xs object-contain rounded-2xl">
                        @else
                        <img src="{{ asset('images/Group 386.png') }}"
                            alt="{{ $service->title }}"
                            class="w-full max-w-xs object-contain">
                        @endif
                    </div>

                    <!-- APPLY FORM CARD -->
                    <div class="bg-[#bfe3e6] rounded-[30px] p-6 sm:p-8 shadow-lg">

                        <h3 class="text-2xl font-semibold text-blue mb-6">
                            Apply for a Loan
                        </h3>

                        <form class="space-y-5">

                            <div>
                                <label class="block text-blue mb-2 font-medium">
                                    Full Name
                                </label>
                                <input type="text"
                                    placeholder="Enter your name"
                                    class="w-full px-4 py-3 rounded-xl
                                       bg-[#dff3f4] border border-[#2e2a7b]/20
                                       focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
                            </div>

                            <div>
                                <label class="block text-blue mb-2 font-medium">
                                    Email Address
                                </label>
                                <input type="email"
                                    placeholder="Enter your email"
                                    class="w-full px-4 py-3 rounded-xl
                                       bg-[#dff3f4] border border-[#2e2a7b]/20
                                       focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
                            </div>

                            <div>
                                <label class="block text-blue mb-2 font-medium">
                                    Phone Number
                                </label>
                                <input type="text"
                                    placeholder="Enter your phone"
                                    class="w-full px-4 py-3 rounded-xl
                                       bg-[#dff3f4] border border-[#2e2a7b]/20
                                       focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
                            </div>

                            <div>
                                <label class="block text-blue mb-2 font-medium">
                                    Loan Category
                                </label>
                                <select
                                    class="w-full px-4 py-3 rounded-xl
                                       bg-[#dff3f4] border border-[#2e2a7b]/20
                                       focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30">
                                    @foreach($services as $svc)
                                    <option value="{{ $svc->slug }}" @selected($svc->id === $service->id)>
                                        {{ $svc->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-blue mb-2 font-medium">
                                    Message
                                </label>
                                <textarea name="message" id="message" class="w-full px-4 py-3 rounded-xl
                                       bg-[#dff3f4] border border-[#2e2a7b]/20
                                       focus:outline-none focus:ring-2 focus:ring-[#2e2a7b]/30" placeholder="Enter your message"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-[#19b6b6] text-white
                                   py-3 rounded-xl font-semibold
                                   hover:opacity-90 transition">
                                Submit
                            </button>
                            <p class="text-blue text-center text-sm">We will get back to you shortly.</p>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <div>


            @if($service->lenders && $service->lenders->isNotEmpty())
            <section class=" mt-10">

                <div class="max-w-7xl mx-auto px-6">

                    <h2 class="text-xl md:text-2xl font-semibold text-blue mb-6">
                        Lenders for {{ $service->title }}
                    </h2>

                    <div class="grid grid-cols-1 gap-6">
                        @foreach($service->lenders as $lender)
                        <div x-data="{ open: false }"
                            class="bg-[#bfe3e6] rounded-[25px] p-6 shadow-lg">

                            <!-- HEADER -->
                            <div class="flex items-center justify-between gap-4">

                                <div class="flex items-center gap-3">
                                    @if(!empty($lender->logo))
                                    <img src="{{ asset('storage/' . $lender->logo) }}"
                                        alt="{{ $lender->name }}"
                                        class="h-10 w-10 rounded-full object-contain bg-white">
                                    @else
                                    <img src="{{ asset('images/sarah.png') }}"
                                        alt="{{ $lender->name }}"
                                        class="h-10 w-10 rounded-full object-contain">
                                    @endif

                                    <div>
                                        <p class="text-sm opacity-80">Lender</p>
                                        <p class="font-semibold text-blue">{{ $lender->name }}</p>
                                    </div>
                                </div>

                                <button class="bg-[#19b6b6] text-blue text-xs
                                       px-3 py-2 rounded-lg font-medium
                                       hover:opacity-90 transition">
                                    ENQUIRE
                                </button>

                            </div>

                            <!-- INFO BOXES -->
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6 text-sm text-blue">

                                <div class="bg-[#19b6b6]/80 rounded-xl px-3 py-10 text-center shadow-md">
                                    <p class="opacity-80">Age Limit</p>
                                    <p class="font-semibold mt-1">{{ $lender->age_limit ?? 'As per lender' }}</p>
                                </div>

                                <div class="bg-[#19b6b6]/80 rounded-xl px-3 py-10 text-center shadow-md">
                                    <p class="opacity-80">Effective Interest Rate</p>
                                    <p class="font-semibold mt-1">{{ $lender->effective_interest_rate ?? 'As per lender' }}</p>
                                </div>

                                <div class="bg-[#19b6b6]/80 rounded-xl px-3 py-10 text-center shadow-md">
                                    <p class="opacity-80">Repayment Period</p>
                                    <p class="font-semibold mt-1">{{ $lender->repayment_period ?? 'As per lender' }}</p>
                                </div>

                            </div>

                            <!-- VIEW MORE BUTTON -->
                            <div class="text-center mt-6">

                                <button @click="open = !open"
                                    class="text-blue font-medium text-sm flex items-center justify-center gap-2 mx-auto hover:text-[#19b6b6] transition">

                                    <span x-text="open ? 'Hide Detailed Information' : 'View Detailed Information'"></span>

                                    <svg class="w-4 h-4 transition-transform duration-300"
                                        :class="open ? 'rotate-180' : ''"
                                        fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>

                                </button>

                            </div>

                            <!-- EXPANDABLE CONTENT -->
                            <div x-show="open"
                                x-transition
                                class="mt-4 border-t border-[#2e2a7b]/20 pt-4 text-blue/90 text-sm">
                                @if(!empty($lender->description))
                                <p class="mb-2 text-zinc-700">
                                    {{ $lender->description }}
                                </p>
                                @else
                                <p class="mb-2 text-zinc-700">
                                    Detailed lender information for this service will be available soon.
                                </p>
                                @endif
                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>

            </section>
            @endif

        </div>

    </section>
</div>