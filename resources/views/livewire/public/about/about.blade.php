@php
use App\Models\DynamicPages;

$dynamic = DynamicPages::where('slug', 'about')->first();
$content = $dynamic?->content ?? [];

$metaTitle = data_get($content, 'meta_title')
  ?? data_get($content, 'hero.title')
  ?? setting('seo_title', config('app.name'));

$metaDescription = data_get($content, 'meta_description') ?? setting('seo_description');
$metaKeywords = data_get($content, 'meta_keywords') ?? setting('seo_keywords');
$stats = data_get($content, 'stats', []);
@endphp

@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)
@section('meta_keywords', $metaKeywords)

<div>
 

  <section class="relative overflow-hidden bg-cyan py-10 lg:py-10">

    <div
      class="absolute inset-0 bg-no-repeat bg-left bg-contain pointer-events-none"
      style="background-image: url('{{ asset('images/hero-bg.png') }}');">
    </div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-12">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

        <!-- Left Content -->
        <div class="max-w-xl">

          <span class="text-blue font-bold tracking-widest uppercase text-3xl py-10 md:text-4xl">
            Our Story
          </span>

          <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

          <h2 class="text-xl md:text-3xl font-bold text-blue leading-tight">
            {{ data_get($content, 'hero.title', 'Our Story') }}

        </h2>

          <div class="mt-6 text-zinc-600 text-sm leading-relaxed">
            {!! data_get($content, 'hero.body', '<p>Rupixtra is a financial services platform built with a clear purpose — to simplify finance and make informed financial decisions accessible to everyone.</p>') !!}
          </div>

          <div class="mt-10">
            <a wire:navigate href="{{ route('reach-us') }}"
              class="inline-block px-8 py-3
                               bg-[#66cfda] text-blue font-semibold
                               hover:opacity-90 transition">
              KNOW MORE
            </a>
          </div>

        </div>

        <!-- Right Image -->
        <div class="flex justify-center lg:justify-end">
          @php $heroImage = data_get($content, 'hero.image'); @endphp
          <img src="{{ $heroImage ? $heroImage : asset('images/about-illustration.png') }}" alt="{{ data_get($content, 'hero.title', 'About') }}" class="w-full max-w-md object-cover">
        </div>

      </div>
    </div>

  </section>
  <section class="relative overflow-hidden bg-cyan py-10 lg:py-10">



    <div class="relative max-w-7xl mx-auto px-6 lg:px-12">

      <span class="text-blue font-bold tracking-widest uppercase text-3xl md:text-4xl">
        {{ data_get($content, 'ethos.title', 'Our Ethos') }}
      </span>

      <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

      <h2 class="text-xl md:text-3xl font-bold text-blue leading-tight">
        {{ data_get($content, 'ethos.heading', 'Built on Trust, Transparency & Responsibility') }}
      </h2>

      <div class="mt-6 text-zinc-600 text-sm leading-relaxed">
        {!! data_get($content, 'ethos.paragraph', '<p>At Rupixtra, our ethos is built on trust, transparency, and responsibility. We believe finance should empower people — not confuse or burden them.</p>') !!}
      </div>

      <!-- Bullet Points -->
      <div class="mt-8 space-y-4">
        @foreach(data_get($content, 'ethos.points', []) as $point)
          <div class="flex items-start gap-3">
            <i class="ri-check-line text-blue text-2xl mt-1"></i>
            <span class="text-blue font-medium">{{ $point }}</span>
          </div>
        @endforeach
        @unless(count(data_get($content, 'ethos.points', [])))
          <div class="flex items-start gap-3">
            <i class="ri-check-line text-blue text-2xl mt-1"></i>
            <span class="text-blue font-medium">Do what is right for the customer</span>
          </div>
        @endunless
      </div>

    </div>

  </section>

  <section class="relative overflow-hidden bg-cyan py-10 lg:py-10">


    <div class="relative max-w-7xl mx-auto px-6 lg:px-12">

      <span class="text-blue font-bold tracking-widest uppercase text-3xl md:text-4xl">
        {{ data_get($content, 'mission.title', 'Our Mission') }}
      </span>

      <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

      <h2 class="text-xl md:text-3xl font-bold text-blue leading-tight">
        {{ data_get($content, 'mission.heading', 'Empowering Financial Confidence') }}
      </h2>

      <div class="mt-6 text-zinc-600 text-sm leading-relaxed">
        {!! data_get($content, 'mission.paragraph', '<p>To empower individuals and businesses with clear, transparent, and responsible financial solutions that help them achieve their goals with confidence.</p>') !!}
      </div>

      <p class="mt-6 text-zinc-600 text-sm font-semibold">We aim to:</p>

      <!-- Bullet Points -->
      <div class="mt-6 space-y-4">
        @foreach(data_get($content, 'mission.points', []) as $point)
          <div class="flex items-start gap-3">
            <i class="ri-check-line text-blue text-2xl mt-1"></i>
            <span class="text-blue font-medium">{{ $point }}</span>
          </div>
        @endforeach
        @unless(count(data_get($content, 'mission.points', [])))
          <div class="flex items-start gap-3">
            <i class="ri-check-line text-blue text-2xl mt-1"></i>
            <span class="text-blue font-medium">Simplify complex financial decisions</span>
          </div>
        @endunless
      </div>

    </div>

  </section>

  <section class="relative overflow-hidden bg-cyan py-10 lg:py-10">


    <div class="relative max-w-7xl mx-auto px-6 lg:px-12 space-y-16">

      <!-- OUR VISION -->
      <div>
        <span class="text-blue font-bold tracking-widest uppercase text-3xl md:text-4xl">
          {{ data_get($content, 'vision.title', 'Our Vision') }}
        </span>

        <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

        <div class="text-zinc-600 text-sm leading-relaxed">
          {!! data_get($content, 'vision.paragraph', '<p>To become a trusted financial partner known for integrity, expertise, and customer-centric advisory across India.</p>') !!}
        </div>

        <p class="mt-6 text-zinc-600 text-sm font-semibold">We envision a future where:</p>

        <div class="mt-6 space-y-4">
          @foreach(data_get($content, 'vision.points', []) as $point)
            <div class="flex items-start gap-3">
              <i class="ri-check-line text-blue text-2xl mt-1"></i>
              <span class="text-blue font-medium">{{ $point }}</span>
            </div>
          @endforeach
          @unless(count(data_get($content, 'vision.points', [])))
            <div class="flex items-start gap-3">
              <i class="ri-check-line text-blue text-2xl mt-1"></i>
              <span class="text-blue font-medium">Financial literacy is accessible to all</span>
            </div>
          @endunless
        </div>
      </div>


      <!-- OUR STRENGTHS -->
      <div>
        <span class="text-blue font-bold tracking-widest uppercase
                         text-3xl md:text-4xl">
          Our Strengths
        </span>

        <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

        <div class="space-y-4">
          @foreach(data_get($content, 'strengths.points', []) as $point)
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">{{ $point }}</span></div>
          @endforeach

          @unless(count(data_get($content, 'strengths.points', [])))
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Instant Eligibility Check</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Multiple Bank & NBFC Options</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Competitive Interest Rates</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Minimal Documentation</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Fast Approval & Disbursal</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Dedicated Expert Support</span></div>

            <div class="flex items-start gap-3">
              <i class="ri-check-line text-blue text-2xl mt-1"></i>
              <span class="text-blue font-medium">
                Partnerships with top banks: Bajaj, Tata Capital, Axis Bank,
                HDFC Bank, Finnable, ICICI Bank
              </span>
            </div>

            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Transparent & compliant processes</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Unbiased recommendations</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Dedicated post-application support</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Compliance-focused operations</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Trusted Partners</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Customer Testimonials</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Strong Google Rating</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">After-sales support</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">RBI-aligned partner institutions</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">End-to-end assistance</span></div>
            <div class="flex items-start gap-3"><i class="ri-check-line text-blue text-2xl mt-1"></i><span class="text-blue font-medium">Support… till you need it</span></div>
          @endunless

        </div>
      </div>

    </div>

  </section>

  <section class="bg-cyan py-12 lg:py-16">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="bg-[#d4f5f6] rounded-3xl shadow-lg 
                px-6 sm:px-10 py-20">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @foreach($stats as $stat)
                <div class="flex flex-col items-center space-y-3">
                    <div class="w-20 h-20 flex items-center justify-center 
                              rounded-full bg-blue text-white text-3xl">
                        {{-- icon placeholder --}}
                        <i class="ri-award-line"></i>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-blue">
                        {{ data_get($stat, 'value') }}
                    </h3>
                    <p class="text-blue text-sm font-medium">
                        {{ data_get($stat, 'label') }}
                    </p>
                </div>
            @endforeach

        </div>

      </div>

    </div>

  </section>


</div>