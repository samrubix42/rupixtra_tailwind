<section class="bg-[#dff3f4] py-16">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- ========================= -->
            <!-- LEFT MAIN CONTENT -->
            <!-- ========================= -->
            <div class="lg:col-span-8">

                <div class="bg-[#bfe3e6] rounded-[25px] p-10 shadow-lg">

                    <!-- Title -->
                    <h1 class="text-3xl md:text-4xl font-semibold text-blue leading-snug">
                        {{ $post->title }}
                    </h1>

                    <!-- Meta -->
                    <div class="flex flex-wrap items-center gap-4 mt-4 text-sm text-blue/70">
                        <span>By Admin</span>
                        <span>•</span>
                        <span>{{ optional($post->created_at)->format('d M Y') }}</span>
                        @if($post->category)
                            <span>•</span>
                            <span>{{ $post->category->title }}</span>
                        @endif
                    </div>

                    <!-- Featured Image -->
                    @if($post->featured_image)
                        <div class="mt-8 rounded-xl overflow-hidden">
                            <img src="{{ asset('storage/' . $post->featured_image) }}"
                                 alt="{{ $post->title }}"
                                 class="w-full h-96 object-cover">
                        </div>
                    @endif

                    <!-- ========================= -->
                    <!-- TinyMCE CONTENT AREA -->
                    <!-- ========================= -->

                    <div class="prose prose-lg max-w-none mt-10
                                prose-headings:text-blue
                                prose-p:text-blue/90
                                prose-a:text-[#19b6b6]
                                prose-strong:text-blue
                                prose-li:text-blue/90">

                        {!! $post->content !!}

                    </div>

                </div>

            </div>

            <!-- ========================= -->
            <!-- RIGHT SIDEBAR -->
            <!-- ========================= -->
            <div class="lg:col-span-4 space-y-8">

                <!-- Categories -->
                <div class="bg-[#bfe3e6] rounded-[25px] p-6 shadow-lg">

                    <h3 class="text-xl font-semibold text-blue mb-4">
                        Categories
                    </h3>

                    <ul class="space-y-3 text-blue/90">

                        @forelse($categories as $category)
                            <li>
                                <a href="#"
                                   class="flex justify-between items-center hover:text-[#19b6b6] transition">
                                    <span>{{ $category->title }}</span>
                                    <span class="text-sm text-blue/60">&nbsp;</span>
                                </a>
                            </li>
                        @empty
                            <li class="text-sm text-blue/60">No categories found.</li>
                        @endforelse

                    </ul>

                </div>

                <!-- Tags -->
                <div class="bg-[#bfe3e6] rounded-[25px] p-6 shadow-lg">

                    <h3 class="text-xl font-semibold text-blue mb-4">
                        Tags
                    </h3>

                    <div class="flex flex-wrap gap-3">

                        @forelse($tags as $tag)
                            <a href="#"
                               class="px-4 py-2 text-sm bg-[#19b6b6]/20
                                      text-blue rounded-full
                                      hover:bg-[#19b6b6] hover:text-white transition">
                                {{ $tag }}
                            </a>
                        @empty
                            <span class="text-sm text-blue/60">No tags.</span>
                        @endforelse

                    </div>

                </div>

                <!-- Recent Posts -->
                <div class="bg-[#bfe3e6] rounded-[25px] p-6 shadow-lg">

                    <h3 class="text-xl font-semibold text-blue mb-4">
                        Recent Posts
                    </h3>

                    <div class="space-y-4">

                        @forelse($recentPosts as $recentPost)
                            <div class="flex gap-4">

                                @if($recentPost->featured_image)
                                    <img src="{{ asset('storage/' . $recentPost->featured_image) }}"
                                         class="w-20 h-20 rounded-lg object-cover">
                                @else
                                    <img src="{{ asset('images/Group 87.png') }}"
                                         class="w-20 h-20 rounded-lg object-cover">
                                @endif

                                <div>
                                    <a href="{{ route('blog.post', $recentPost->slug) }}"
                                       class="text-sm font-medium text-blue hover:text-[#19b6b6] transition">
                                        {{ \Illuminate\Support\Str::limit($recentPost->title, 50) }}
                                    </a>

                                    <p class="text-xs text-blue/60 mt-1">
                                        {{ optional($recentPost->created_at)->format('d M Y') }}
                                    </p>
                                </div>

                            </div>
                        @empty
                            <p class="text-sm text-blue/60">No recent posts.</p>
                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
