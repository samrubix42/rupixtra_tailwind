<section class="bg-[#dff3f4] py-16">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->
        <div class="mb-10">
            <span class="text-blue font-bold tracking-widest uppercase text-sm">Our Services</span>
            <h1 class="mt-2 text-3xl md:text-4xl font-semibold text-blue leading-snug">
                {{ $service->title }}
            </h1>
            <div class="w-16 h-1.5 bg-zinc-700 rounded mt-3"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- MAIN CONTENT -->
            <div class="lg:col-span-8">
                <div class="bg-[#bfe3e6] rounded-[25px] p-6 md:p-8 lg:p-10 shadow-[0_15px_40px_rgba(0,0,0,0.08)]">

                    @if ($service->featured_image)
                        <div class="rounded-2xl overflow-hidden mb-8">
                            <img
                                src="{{ asset('storage/' . $service->featured_image) }}"
                                alt="{{ $service->title }}"
                                class="w-full h-80 object-cover"
                            />
                        </div>
                    @endif

                    <!-- Primary rich content -->
                    <div class="prose prose-lg max-w-none mt-2
                                prose-headings:text-blue
                                prose-p:text-blue/90
                                prose-a:text-[#19b6b6]
                                prose-strong:text-blue
                                prose-li:text-blue/90">
                        {!! $service->primary_section !!}
                    </div>

                    <!-- Secondary sections (key/value cards) -->
                    @if (!empty($service->secondary_sections))
                        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-6">
                            @foreach ($service->secondary_sections as $section)
                                @if (!empty($section['title']) || !empty($section['items']))
                                    <div class="bg-white/80 rounded-2xl p-5 shadow-sm border border-white/60">
                                        @if (!empty($section['title']))
                                            <h3 class="text-sm font-semibold text-blue mb-3">
                                                {{ $section['title'] }}
                                            </h3>
                                        @endif

                                        @if (!empty($section['items']))
                                            <dl class="space-y-2 text-sm text-blue/90">
                                                @foreach ($section['items'] as $item)
                                                    @if (!empty($item['key']) || !empty($item['value']))
                                                        <div class="flex justify-between gap-3">
                                                            <dt class="font-medium text-blue">{{ $item['key'] }}</dt>
                                                            <dd class="text-right text-blue/80">{{ $item['value'] }}</dd>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </dl>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    <!-- Tertiary sections (detailed blocks) -->
                    @if (!empty($service->tertiary_sections))
                        <div class="mt-10 space-y-6">
                            @foreach ($service->tertiary_sections as $section)
                                @if (!empty($section['title']) || !empty($section['description']) || !empty($section['items']))
                                    <div class="bg-white/80 rounded-2xl p-6 shadow-sm border border-white/60">
                                        @if (!empty($section['title']))
                                            <h3 class="text-lg font-semibold text-blue mb-2">
                                                {{ $section['title'] }}
                                            </h3>
                                        @endif

                                        @if (!empty($section['description']))
                                            <p class="text-sm text-blue/80 mb-4">
                                                {{ $section['description'] }}
                                            </p>
                                        @endif

                                        @if (!empty($section['items']))
                                            <dl class="space-y-2 text-sm text-blue/90">
                                                @foreach ($section['items'] as $item)
                                                    @if (!empty($item['key']) || !empty($item['value']))
                                                        <div class="flex justify-between gap-3">
                                                            <dt class="font-medium text-blue">{{ $item['key'] }}</dt>
                                                            <dd class="text-right text-blue/80">{{ $item['value'] }}</dd>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </dl>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="lg:col-span-4 space-y-6">

                <div class="bg-[#bfe3e6] rounded-[25px] p-6 shadow-lg">
                    <h3 class="text-xl font-semibold text-blue mb-3">
                        Why choose this service?
                    </h3>
                    <p class="text-sm text-blue/80 mb-4">
                        Get personalised guidance, transparent information, and end-to-end support to make the right financial decision for your needs.
                    </p>
                    <ul class="space-y-2 text-sm text-blue/90">
                        <li class="flex items-center gap-2">
                            <span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-[#19b6b6]/20 text-[#19b6b6]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </span>
                            Expert consultation
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-[#19b6b6]/20 text-[#19b6b6]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </span>
                            Tailored recommendations
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-[#19b6b6]/20 text-[#19b6b6]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </span>
                            Hassle-free process
                        </li>
                    </ul>
                </div>

                <div class="bg-[#bfe3e6] rounded-[25px] p-6 shadow-lg">
                    <h3 class="text-lg font-semibold text-blue mb-2">Talk to our team</h3>
                    <p class="text-sm text-blue/80 mb-4">
                        Have questions about this service or need help choosing the right option? Reach out and we’ll assist you.
                    </p>
                    <a href="{{ route('reach-us') }}"
                       class="inline-flex w-full items-center justify-center rounded-xl bg-[#19b6b6] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:opacity-90 transition">
                        Contact us
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>