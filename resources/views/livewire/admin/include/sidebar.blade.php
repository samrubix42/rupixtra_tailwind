<aside
    @php
    use App\View\Builders\AdminSidebar;

    $sidebarItems=AdminSidebar::menu(auth()->user())->get();
    @endphp
    class="fixed inset-y-0 left-0 z-30 w-64
    bg-slate-900 text-slate-300 shadow-xl
    transform transition-transform duration-300
    lg:translate-x-0 lg:static"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <!-- Logo -->
    <div class="flex items-center h-16 px-6 border-b border-slate-800">
        <span class="text-lg font-semibold text-white">
            HMS Admin
        </span>
    </div>

    <!-- Navigation -->
    <nav class="px-3 py-4 space-y-1" x-data="{ openMenu: null }">

        @foreach ($sidebarItems as $item)

        {{-- SINGLE ITEM --}}
        @if (! $item->hasSubmenu)
        <a
            href="{{ $item->url }}"
            class="flex items-center gap-3 px-4 py-2.5 rounded-md transition
                        {{ request()->url() === $item->url
                            ? 'bg-slate-800 text-white font-medium border-l-4 border-purple-500'
                            : 'hover:bg-slate-800' }}">
            <i class="{{ $item->icon }}
                        {{ request()->url() === $item->url
                            ? 'text-purple-400'
                            : 'text-slate-400' }}">
            </i>

            {{ $item->title }}
        </a>

        {{-- DROPDOWN --}}
        @else
        <div>
            <button
                @click="openMenu === '{{ $item->title }}'
                            ? openMenu = null
                            : openMenu = '{{ $item->title }}'"
                class="w-full flex items-center justify-between
                               px-4 py-2.5 rounded-md hover:bg-slate-800 transition">

                <div class="flex items-center gap-3">
                    <i class="{{ $item->icon }} text-slate-400"></i>
                    <span>{{ $item->title }}</span>
                </div>

                {{-- Dropdown indicator for submenu (Remix Icon) --}}
                <i class="ri-arrow-down-s-line text-slate-400 text-lg transition-transform duration-200"
                    :class="openMenu === '{{ $item->title }}' ? 'rotate-180 text-purple-400' : 'text-slate-400'">
                </i>
            </button>

            <div
                x-show="openMenu === '{{ $item->title }}'"
                x-collapse
                class="ml-8 mt-1 space-y-1">

                @foreach ($item->submenu as $child)
                <a
                    href="{{ $child->url }}"
                    class="block px-3 py-2 text-sm rounded-md transition
                                    {{ request()->url() === $child->url
                                        ? 'bg-slate-800 text-white'
                                        : 'hover:bg-slate-800' }}">
                    <i class="{{ $child->icon }} mr-2 text-xs"></i>
                    {{ $child->title }}
                </a>
                @endforeach
            </div>
        </div>
        @endif

        @endforeach

    </nav>
</aside>