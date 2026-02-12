<div>
    <section class="bg-[#dff3f4] py-20">

        <div class="max-w-7xl mx-auto px-6">


            <span class="text-blue font-bold tracking-widest uppercase
                     text-3xl md:text-4xl">
                Blog
            </span>

            <!-- underline -->
            <div class="w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-6"></div>
            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                @forelse($posts as $post)
                    <!-- CARD -->
                    <div class="bg-[#bfe3e6] rounded-3xl p-6 
                            shadow-[0_15px_40px_rgba(0,0,0,0.08)]
                            hover:shadow-[0_20px_50px_rgba(0,0,0,0.12)]
                            transition duration-300">

                        <!-- Image Wrapper -->
                        <div class="relative overflow-hidden">

                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}"
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover">
                            @else
                                <img src="{{ asset('images/Group 87.png') }}"
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover">
                            @endif

                            <!-- Date Badge -->
                            <span class="absolute top-4 left-4 
                                     bg-black/60 text-white text-xs
                                     px-3 py-1 uppercase">
                                {{ optional($post->created_at)->format('d M Y') }}
                            </span>

                            <!-- By Admin -->
                            <span class="absolute bottom-4 right-4 
                                     text-white text-sm font-medium">
                                By Admin
                            </span>

                        </div>

                        <!-- Content -->
                        <div class="mt-6">

                            <h3 class="text-lg font-semibold text-blue leading-snug">
                                {{ $post->title }}
                            </h3>

                            <p class="text-sm text-blue/70 mt-3 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($post->meta_description ?? $post->content), 120) }}
                            </p>

                            <a href="{{ route('blog.post', $post->slug) }}"
                               class="inline-block mt-4 text-sm font-medium
                                  text-blue underline hover:text-[#19b6b6] transition">
                                Read More...
                            </a>

                        </div>
                    </div>
                @empty
                    <p class="text-blue/70">No blog posts available yet.</p>
                @endforelse

            </div>

        </div>

    </section>
</div>