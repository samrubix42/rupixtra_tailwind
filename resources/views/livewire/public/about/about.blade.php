@php
$aboutPage = \App\Models\Page::where('slug', 'our-story')->first();

$metaTitle = $aboutPage?->meta_title
?? $aboutPage?->title
?? setting('seo_title', config('app.name'));

$metaDescription = $aboutPage?->meta_description
?? setting('seo_description');

$metaKeywords = $aboutPage?->meta_keywords
?? setting('seo_keywords');
@endphp

@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)
@section('meta_keywords', $metaKeywords)

<div>
  <!-- <section class="relative overflow-hidden bg-cyan py-20 lg:py-28">


    <div
      class="absolute inset-0 bg-no-repeat bg-left bg-contain  pointer-events-none"
      style="background-image: url('{{ asset('images/hero-bg.png') }}');">
    </div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-12">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">


        <div class="max-w-xl">

          <span class="text-blue font-bold tracking-widest uppercase
                     text-3xl md:text-4xl">
            Our Story
          </span>


          <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

          <h2 class="text-xl md:text-3xl font-bold text-blue leading-tight">
            Why Choose Us
          </h2>

          <p class="mt-6 text-blue font-semibold">
            Experience excellence in loan review and comparison.
          </p>

          <p class="mt-2 text-zinc-500 text-sm leading-relaxed">
            Our dedicated team conducts thorough research and analysis
            to provide comprehensive and unbiased reviews.
          </p>

          <div class="mt-8 space-y-4">


            <div class="flex items-center gap-3">
              <i class="ri-check-line text-blue text-2xl"></i>
              <span class="text-blue font-medium">
                Comprehensive Reviews
              </span>
            </div>

            <div class="flex items-center gap-3">
              <i class="ri-check-line text-blue text-2xl"></i>
              <span class="text-blue font-medium">
                Expert Guidance & Insights
              </span>
            </div>

            <div class="flex items-center gap-3">
              <i class="ri-check-line text-blue text-2xl"></i>
              <span class="text-blue font-medium">
                User-Friendly Comparison
              </span>
            </div>

            <div class="flex items-center gap-3">
              <i class="ri-check-line text-blue text-2xl"></i>
              <span class="text-blue font-medium">
                Trusted User Reviews
              </span>
            </div>

          </div>


          <div class="mt-10">
            <a href="#"
              class="inline-block px-8 py-3
                   bg-[#66cfda] text-blue font-semibold
                   hover:opacity-90 transition">
              READ MORE
            </a>
          </div>

        </div>

        <div class="flex justify-center lg:justify-end">
          <img src="{{ asset('images/about-illustration.png') }}"
            alt="Loan Illustration"
            class="w-full max-w-lg">
        </div>

      </div>
    </div>

  </section> -->

  <section class="relative overflow-hidden bg-cyan py-20 lg:py-28">

    <div
      class="absolute inset-0 bg-no-repeat bg-left bg-contain pointer-events-none"
      style="background-image: url('{{ asset('images/hero-bg.png') }}');">
    </div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-12">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

        <!-- Left Content -->
        <div class="max-w-xl">

          <span class="text-blue font-bold tracking-widest uppercase
                             text-3xl md:text-4xl">
            Our Story
          </span>

          <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

          <h2 class="text-xl md:text-3xl font-bold text-blue leading-tight">
            Simplifying Finance for Everyone
          </h2>

          <p class="mt-6 text-zinc-600 text-sm leading-relaxed">
            Rupixtra is a financial services platform built with a clear purpose —
            to simplify finance and make informed financial decisions accessible
            to everyone.
          </p>

          <p class="mt-4 text-zinc-600 text-sm leading-relaxed">
            Born as the brainchild of experienced ex-bankers and seasoned finance advisors,
            Rupixtra brings together deep industry knowledge, regulatory understanding,
            and customer-first thinking.
          </p>

          <p class="mt-4 text-zinc-600 text-sm leading-relaxed">
            Having spent years inside the banking and financial ecosystem, our founders
            understood a critical gap: people often struggle to find transparent,
            unbiased, and reliable financial guidance.
          </p>

          <p class="mt-4 text-zinc-600 text-sm leading-relaxed">
            Rupixtra was created to bridge that gap.
          </p>

          <p class="mt-4 text-zinc-600 text-sm leading-relaxed">
            We work closely with leading banks, NBFCs, insurers, and asset management
            companies to offer a wide range of financial solutions — loans, credit cards,
            investments, and insurance — while ensuring every recommendation is aligned
            with the customer’s needs and long-term financial well-being.
          </p>

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
          <img src="{{ asset('images/about-illustration.png') }}"
            alt="Rupixtra Illustration"
            class="w-full max-w-lg">
        </div>

      </div>
    </div>

  </section>
  <section class="relative overflow-hidden bg-cyan py-10 lg:py-10">



    <div class="relative max-w-7xl mx-auto px-6 lg:px-12">

      <span class="text-blue font-bold tracking-widest uppercase
                     text-3xl md:text-4xl">
        Our Ethos
      </span>

      <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

      <h2 class="text-xl md:text-3xl font-bold text-blue leading-tight">
        Built on Trust, Transparency & Responsibility
      </h2>

      <p class="mt-6 text-zinc-600 text-sm leading-relaxed">
        At Rupixtra, our ethos is built on trust, transparency, and responsibility.
        We believe finance should empower people — not confuse or burden them.
      </p>

      <p class="mt-2 text-zinc-600 text-sm leading-relaxed">
        Every solution we offer is guided by integrity, compliance, and ethical
        advisory practices. We do not believe in one-size-fits-all products.
      </p>

      <p class="mt-2 text-zinc-600 text-sm leading-relaxed">
        Instead, we focus on understanding individual needs, risk profiles,
        and financial goals before suggesting any financial solution.
      </p>

      <!-- Bullet Points -->
      <div class="mt-8 space-y-4">

        <div class="flex items-start gap-3">
          <i class="ri-check-line text-blue text-2xl mt-1"></i>
          <span class="text-blue font-medium">
            Do what is right for the customer
          </span>
        </div>

        <div class="flex items-start gap-3">
          <i class="ri-check-line text-blue text-2xl mt-1"></i>
          <span class="text-blue font-medium">
            Follow regulatory and compliance standards strictly
          </span>
        </div>

        <div class="flex items-start gap-3">
          <i class="ri-check-line text-blue text-2xl mt-1"></i>
          <span class="text-blue font-medium">
            Build long-term relationships, not one-time transactions
          </span>
        </div>

      </div>

    </div>

  </section>

  <section class="relative overflow-hidden bg-cyan py-10 lg:py-10">


    <div class="relative max-w-7xl mx-auto px-6 lg:px-12">

      <span class="text-blue font-bold tracking-widest uppercase
                     text-3xl md:text-4xl">
        Our Mission
      </span>

      <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

      <h2 class="text-xl md:text-3xl font-bold text-blue leading-tight">
        Empowering Financial Confidence
      </h2>

      <p class="mt-6 text-zinc-600 text-sm leading-relaxed">
        To empower individuals and businesses with clear, transparent, and responsible
        financial solutions that help them achieve their goals with confidence.
      </p>

      <p class="mt-6 text-zinc-600 text-sm font-semibold">
        We aim to:
      </p>

      <!-- Bullet Points -->
      <div class="mt-6 space-y-4">

        <div class="flex items-start gap-3">
          <i class="ri-check-line text-blue text-2xl mt-1"></i>
          <span class="text-blue font-medium">
            Simplify complex financial decisions
          </span>
        </div>

        <div class="flex items-start gap-3">
          <i class="ri-check-line text-blue text-2xl mt-1"></i>
          <span class="text-blue font-medium">
            Provide unbiased and compliant financial guidance
          </span>
        </div>

        <div class="flex items-start gap-3">
          <i class="ri-check-line text-blue text-2xl mt-1"></i>
          <span class="text-blue font-medium">
            Offer access to the right products through trusted partners
          </span>
        </div>

        <div class="flex items-start gap-3">
          <i class="ri-check-line text-blue text-2xl mt-1"></i>
          <span class="text-blue font-medium">
            Support customers throughout their financial journey
          </span>
        </div>

      </div>

    </div>

  </section>

  <section class="relative overflow-hidden bg-cyan py-10 lg:py-10">


    <div class="relative max-w-7xl mx-auto px-6 lg:px-12 space-y-16">

      <!-- OUR VISION -->
      <div>
        <span class="text-blue font-bold tracking-widest uppercase
                         text-3xl md:text-4xl">
          Our Vision
        </span>

        <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>

        <p class="text-zinc-600 text-sm leading-relaxed">
          To become a trusted financial partner known for integrity, expertise,
          and customer-centric advisory across India.
        </p>

        <p class="mt-6 text-zinc-600 text-sm font-semibold">
          We envision a future where:
        </p>

        <div class="mt-6 space-y-4">

          <div class="flex items-start gap-3">
            <i class="ri-check-line text-blue text-2xl mt-1"></i>
            <span class="text-blue font-medium">
              Financial literacy is accessible to all
            </span>
          </div>

          <div class="flex items-start gap-3">
            <i class="ri-check-line text-blue text-2xl mt-1"></i>
            <span class="text-blue font-medium">
              Customers make informed and confident financial choices
            </span>
          </div>

          <div class="flex items-start gap-3">
            <i class="ri-check-line text-blue text-2xl mt-1"></i>
            <span class="text-blue font-medium">
              Advisory is ethical, transparent, and value-driven
            </span>
          </div>

          <div class="flex items-start gap-3">
            <i class="ri-check-line text-blue text-2xl mt-1"></i>
            <span class="text-blue font-medium">
              Rupixtra is recognized as a benchmark for trust in financial services
            </span>
          </div>

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

        </div>
      </div>

    </div>

  </section>

  <section class="bg-cyan py-12 lg:py-16">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="bg-[#d4f5f6] rounded-3xl shadow-lg 
                px-6 sm:px-10 py-20">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">

          <!-- Item 1 -->
          <div class="flex flex-col items-center space-y-3">
            <div class="w-20 h-20 flex items-center justify-center 
                      rounded-full bg-blue text-white text-3xl">
              <i class="ri-money-rupee-circle-fill"></i>
            </div>
            <h3 class="text-2xl sm:text-3xl font-bold text-blue">
              66.6k
            </h3>
            <p class="text-blue text-sm font-medium">
              Total Services Loan
            </p>
          </div>

          <!-- Item 2 -->
          <div class="flex flex-col items-center space-y-3">
            <div class="w-20 h-20 flex items-center justify-center 
                      rounded-full bg-blue text-white text-3xl">
              <i class="ri-emotion-happy-line"></i>
            </div>
            <h3 class="text-2xl sm:text-3xl font-bold text-blue">
              99.6k
            </h3>
            <p class="text-blue text-sm font-medium">
              Customer Satisfaction
            </p>
          </div>

          <!-- Item 3 -->
          <div class="flex flex-col items-center space-y-3">
            <div class="w-20 h-20 flex items-center justify-center 
                      rounded-full bg-blue text-white text-3xl">
              <i class="ri-bank-line"></i>
            </div>
            <h3 class="text-2xl sm:text-3xl font-bold text-blue">
              44.6k
            </h3>
            <p class="text-blue text-sm font-medium">
              Compare Loan
            </p>
          </div>

          <!-- Item 4 -->
          <div class="flex flex-col items-center space-y-3">
            <div class="w-20 h-20 flex items-center justify-center 
                      rounded-full bg-blue text-white text-3xl">
              <i class="ri-award-line"></i>
            </div>
            <h3 class="text-2xl sm:text-3xl font-bold text-blue">
              56+
            </h3>
            <p class="text-blue text-sm font-medium">
              Awards Won
            </p>
          </div>

        </div>

      </div>

    </div>

  </section>


</div>