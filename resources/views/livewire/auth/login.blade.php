<x-slot name="title">Admin Login</x-slot>

<div class="flex h-full items-center justify-center">
    <div class="w-full max-w-md">
        <!-- Card -->
        <div class="overflow-hidden rounded-2xl bg-white shadow-xl border border-slate-100">
            <!-- Header with logo -->
            <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-900 px-6 py-5">
                <div class="inline-flex h-auto w-16 items-center justify-center  text-white shadow-lg">
                    <img src="{{ asset('images/logo-dark.png') }}" alt="rupixtra Logo">
                </div>
                <div>
                    <p class="text-sm font-semibold tracking-wide text-white">Rupixtra</p>
                    <p class="text-xs text-slate-300">Secure admin access</p>
                </div>
            </div>

            <!-- Form -->
            <div class="px-6 py-6">
                <h2 class="text-base font-semibold text-slate-900">Sign in to your account</h2>
                <p class="mt-1 text-xs text-slate-500">Use your admin credentials to continue.</p>

                <form wire:submit.prevent="login" class="mt-5 space-y-4">
                    <!-- Email -->
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1" for="email">Email</label>
                        <input
                            id="email"
                            type="email"
                            wire:model.defer="email"
                            autocomplete="email"
                            class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                   placeholder:text-slate-400 focus:border-blue-500 focus:ring-2
                                   focus:ring-blue-500/40 outline-none"
                            placeholder="admin@example.com">
                        @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label class="block text-xs font-medium text-slate-600" for="password">Password</label>
                        </div>
                        <input
                            id="password"
                            type="password"
                            wire:model.defer="password"
                            autocomplete="current-password"
                            class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                   placeholder:text-slate-400 focus:border-blue-500 focus:ring-2
                                   focus:ring-blue-500/40 outline-none"
                            placeholder="••••••••">
                        @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember me -->
                    <div class="flex items-center justify-between text-xs">
                        <label class="inline-flex items-center gap-2 text-slate-600">
                            <input
                                type="checkbox"
                                wire:model="remember"
                                class="h-3.5 w-3.5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                            <span>Remember me</span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <div class="pt-1">
                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-md bg-blue-600 px-4 py-2.5
                                   text-sm font-semibold text-white shadow-sm hover:bg-blue-500
                                   focus:outline-none focus:ring-2 focus:ring-blue-500/70 focus:ring-offset-1">
                            <span>Sign in</span>
                            <i class="ri-arrow-right-line text-base"></i>
                        </button>
                    </div>

                   
                </form>
            </div>
        </div>
    </div>
</div>