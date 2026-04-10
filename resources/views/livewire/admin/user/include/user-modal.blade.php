<div
    x-data="{ modalOpen: false }"
    x-on:open-modal.window="modalOpen = true"
    x-on:close-modal.window="modalOpen = false"
    x-cloak
>
    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed inset-0 z-[99] flex items-center justify-center px-4">
            <div @click="modalOpen=false" class="absolute inset-0 bg-black/40"></div>

            <div
                x-show="modalOpen"
                x-transition
                x-trap.inert.noscroll="modalOpen"
                class="relative w-full max-w-xl rounded-xl bg-white p-6 shadow-xl"
            >
                <h3 class="text-lg font-semibold text-slate-900 mb-4">
                    {{ $userId ? 'Edit User' : 'Add User' }}
                </h3>

                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Full Name</label>
                        <input
                            wire:model.live="name"
                            placeholder="User full name"
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                        >
                        @error('name')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Email</label>
                        <input
                            type="email"
                            wire:model.live="email"
                            placeholder="user@email.com"
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                        >
                        @error('email')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    @if($userId)
                        <div class="flex items-center justify-between rounded-md border border-slate-200 bg-slate-50 px-3 py-2">
                            <p class="text-xs text-slate-600">Password is unchanged by default.</p>

                            @if($changePassword)
                                <button
                                    type="button"
                                    wire:click="disablePasswordChange"
                                    class="text-xs font-medium text-slate-700 hover:text-slate-900"
                                >
                                    Cancel password change
                                </button>
                            @else
                                <button
                                    type="button"
                                    wire:click="enablePasswordChange"
                                    class="text-xs font-medium text-blue-600 hover:text-blue-500"
                                >
                                    Change password
                                </button>
                            @endif
                        </div>
                    @endif

                    @if(! $userId || $changePassword)
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Password</label>
                            <input
                                type="password"
                                wire:model="password"
                                placeholder="Minimum 8 characters"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                            @error('password')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Confirm Password</label>
                            <input
                                type="password"
                                wire:model="password_confirmation"
                                placeholder="Retype password"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                        </div>
                    @endif
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button
                        @click="modalOpen=false"
                        class="rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50"
                    >
                        Cancel
                    </button>
                    <button
                        wire:click="save"
                        class="inline-flex items-center gap-1 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white
                               hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1"
                    >
                        <i class="ri-save-3-line text-base"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
