<aside
    @php
    use App\View\Builders\AdminSidebar;
    $sidebarItems = AdminSidebar::menu(auth()->user())->get();
    @endphp
    class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-slate-300 shadow-2xl
           transform transition-transform duration-300 lg:translate-x-0 lg:static"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <!-- Logo -->
    <div class="flex items-center h-16 px-6 bg-slate-900">
        <span class="text-xl font-bold text-white tracking-wide">
            HMS Admin
        </span>
    </div>

    <!-- Navigation -->
    <nav class="px-3 py-6 space-y-1" x-data="{ openMenu: null }">

        @foreach ($sidebarItems as $item)

        {{-- SINGLE ITEM --}}
        @if (! $item->hasSubmenu)
        <a
            href="{{ $item->url }}"
            wire:navigate
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition
                   {{ request()->url() === $item->url
                       ? 'bg-slate-800 text-white font-semibold shadow-inner'
                       : 'hover:bg-slate-800 hover:text-white' }}">
            <i class="{{ $item->icon }}
                      {{ request()->url() === $item->url
                          ? 'text-blue-400'
                          : 'text-slate-400' }} text-lg"></i>
            <span class="flex-1">{{ $item->title }}</span>
        </a>

        {{-- DROPDOWN --}}
        @else
        <div>
            <button
                @click="openMenu === '{{ $item->title }}'
                            ? openMenu = null
                            : openMenu = '{{ $item->title }}'"
                class="w-full flex items-center justify-between px-4 py-3 rounded-lg
                       hover:bg-slate-800 transition group">

                <div class="flex items-center gap-3">
                    <i class="{{ $item->icon }} text-slate-400 text-lg group-hover:text-white"></i>
                    <span class="flex-1 group-hover:text-white">{{ $item->title }}</span>
                </div>

                <i class="ri-arrow-down-s-line text-slate-400 text-lg transition-transform duration-200"
                   :class="openMenu === '{{ $item->title }}' ? 'rotate-180 text-blue-400' : ''">
                </i>
            </button>

            <div
                x-show="openMenu === '{{ $item->title }}'"
                x-collapse
                class="ml-6 mt-1 space-y-1">

                @foreach ($item->submenu as $child)
                <a
                    href="{{ $child->url }}"
                    wire:navigate
                    class="flex items-center px-3 py-2 text-sm rounded-lg transition
                           {{ request()->url() === $child->url
                               ? 'bg-slate-800 text-white font-medium'
                               : 'hover:bg-slate-800 hover:text-white' }}">
                    <i class="{{ $child->icon }} mr-2 text-xs text-slate-400 group-hover:text-white"></i>
                    {{ $child->title }}
                </a>
                @endforeach
            </div>
        </div>
        @endif

        @endforeach

    </nav>
</aside>