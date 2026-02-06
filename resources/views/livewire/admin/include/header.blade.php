<header class="sticky top-0 z-20 bg-white/80 backdrop-blur shadow-sm">
    <div class="flex items-center justify-between h-16 px-6">

        <!-- Left -->
        <div class="flex items-center gap-4">

            <!-- Sidebar toggle -->
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="lg:hidden p-2 rounded-lg hover:bg-slate-100">
                <i class="ri-menu-2-line text-xl text-slate-700"></i>
            </button>

            <h1 class="text-lg font-semibold text-slate-800">
                Dashboard
            </h1>
        </div>

      

        <!-- Right -->
        <div class="flex items-center gap-4">

            <!-- Notifications -->
            <button class="relative p-2 rounded-lg hover:bg-slate-100">
                <i class="ri-notification-3-line text-xl text-slate-700"></i>
                <span class="absolute top-2 right-2 h-2 w-2 bg-red-500 rounded-full"></span>
            </button>

            <!-- User -->
            <div x-data="{ open: false }" class="relative">
                <button
                    @click="open = !open"
                    class="flex items-center gap-2 p-1 rounded-full hover:bg-slate-100">

                    <img
                        src="https://ui-avatars.com/api/?name=Admin&background=e2e8f0&color=334155"
                        class="h-8 w-8 rounded-full">

                    <span class="hidden md:block text-sm font-medium text-slate-700">
                        Admin
                    </span>

                    <i class="ri-arrow-down-s-line text-slate-600"></i>
                </button>

                <!-- Dropdown -->
                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 mt-2 w-48 bg-white
                           rounded-xl shadow-lg overflow-hidden">

                    <a class="flex items-center gap-2 px-4 py-2 hover:bg-slate-100">
                        <i class="ri-user-line"></i> Profile
                    </a>

                    <a class="flex items-center gap-2 px-4 py-2 hover:bg-slate-100">
                        <i class="ri-settings-3-line"></i> Settings
                    </a>

                    <hr>

                    <a class="flex items-center gap-2 px-4 py-2 text-red-500 hover:bg-slate-100">
                        <i class="ri-logout-box-line"></i> Logout
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>