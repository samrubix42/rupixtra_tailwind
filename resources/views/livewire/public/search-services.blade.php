<div class="w-full">

    <!-- ================= MOBILE SEARCH ================= -->
    <div x-data="{ open: false }" class="relative w-full md:hidden">

        <input
            x-ref="search"
            wire:model.live="query"
            @focus="open = true"
            @click="open = true"
            @keydown.escape="open = false"
            type="text"
            placeholder="Search..."
            class="w-full bg-[#eefcfd] border border-gray-400 rounded-full 
                   pl-5 pr-12 py-2 text-sm
                   focus:outline-none focus:ring-2 focus:ring-[#112b5e]" />

        <i class="ri-search-line absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"></i>

        <!-- Dropdown -->
        <div x-show="open"
            x-transition
            x-cloak
            @click.away="open = false"
            class="absolute mt-2 w-full bg-white shadow-lg border border-gray-100 z-50 rounded max-h-60 overflow-y-auto">

            @if(count($results))
            @foreach($results as $service)
            <a wire:navigate
                href="{{ route('services', ['slug' => $service->slug]) }}"
                @click="open = false"
                class="block px-4 py-2 text-sm text-zinc-700 hover:bg-cyan-50">
                {{ $service->title }}
            </a>
            @endforeach
            @else
            @if($query !== '')
            <div class="px-4 py-2 text-sm text-zinc-500">
                No results found
            </div>
            @endif
            @endif

        </div>
    </div>


    <!-- ================= DESKTOP SEARCH ================= -->
   <div
    x-data="{ open: false }"
    class="relative hidden md:block">

    <!-- Search Input -->
    <div class="relative">

        <input
            wire:model.live="query"
            type="text"
            placeholder="Search..."

            @click.stop="open = !open"
            @keydown.escape="open = false"

            :class="open 
                ? 'max-w-md ' 
                : 'max-w-[160px]  '"

            class="w-full  border border-gray-400 rounded-full
                   pl-5 pr-12 py-2 text-sm
                   
                   transition-all duration-700
                
                   focus:outline-none focus:ring-2 focus:ring-[#112b5e]" />

        <!-- Icon -->
        <i
            @click.stop="open = !open"
            class="ri-search-line absolute right-4 top-1/2 -translate-y-1/2 
                   text-gray-500 cursor-pointer">
        </i>

    </div>

    <!-- Dropdown -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        @click.away="open = false"
        x-cloak
        class="absolute mt-2 w-full bg-white shadow-lg border border-gray-100 
               z-50 rounded max-h-60 overflow-y-auto">

        @if(count($results))
            @foreach($results as $service)
                <a wire:navigate
                    href="{{ route('services', ['slug' => $service->slug]) }}"
                    @click="open = false"
                    class="block px-4 py-2 text-sm text-zinc-700 hover:bg-cyan-50">
                    {{ $service->title }}
                </a>
            @endforeach
        @else
            @if($query !== '')
                <div class="px-4 py-2 text-sm text-zinc-500">
                    No results found
                </div>
            @endif
        @endif

    </div>

</div>

</div>