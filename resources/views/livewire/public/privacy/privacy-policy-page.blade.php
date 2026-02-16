<div class="bg-cyan py-12 sm:py-16 lg:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <span class="text-dark-cyan font-bold tracking-widest uppercase text-base sm:text-lg">
                Legal
            </span>
            <div class="w-14 sm:w-16 h-1.5 bg-zinc-700 rounded mt-2 mb-4"></div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-blue mb-2">
                {{ $page->title ?? 'Privacy Policy' }}
            </h1>

            @if($page && $page->updated_at)
                <p class="text-xs sm:text-sm text-blue/70">
                    Last updated: {{ $page->updated_at->format('F d, Y') }}
                </p>
            @endif
        </div>

        @if($page && $page->content)
            <div class="tinymce-content bg-[#dff3f4] rounded-3xl shadow-md p-5 sm:p-8 lg:p-10">
                {!! $page->content !!}
            </div>
        @else
            <div class="bg-[#dff3f4] rounded-3xl shadow-md p-6 text-blue/80 text-sm sm:text-base">
                The privacy policy content is not available yet. Please check back later.
            </div>
        @endif
    </div>
</div>
