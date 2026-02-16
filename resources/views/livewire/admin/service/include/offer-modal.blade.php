<div
    x-data="{ modalOpen: false }"
    x-on:open-modal.window="modalOpen = true"
    x-on:close-modal.window="modalOpen = false"
    x-cloak
>
    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed inset-0 z-[99] flex items-center justify-center px-4">
            <div @click="modalOpen = false" class="absolute inset-0 bg-black/40"></div>

            <div
                x-show="modalOpen"
                x-transition
                x-trap.inert.noscroll="modalOpen"
                class="relative w-full max-w-xl rounded-xl bg-white p-6 shadow-xl"
            >
                <h3 class="text-lg font-semibold text-slate-900 mb-4">
                    {{ $offerId ? 'Edit Offer' : 'Add Offer' }}
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Offer URL</label>
                        <input
                            type="text"
                            wire:model.live="url"
                            placeholder="https://example.com/landing-page"
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                        >
                        @error('url')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Featured Image</label>
                        <input
                            type="file"
                            wire:model="featured_image"
                            accept="image/*"
                            class="block w-full text-sm text-slate-700 file:mr-4 file:rounded-md file:border-0
                                   file:bg-slate-100 file:px-3 file:py-1.5 file:text-sm file:font-medium
                                   hover:file:bg-slate-200"
                        >
                        @error('featured_image')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror

                        <div class="mt-3 flex items-center gap-4">
                            @if($featured_image)
                                <div class="h-16 w-28 rounded-md overflow-hidden border border-slate-200 bg-slate-50">
                                    <img src="{{ $featured_image->temporaryUrl() }}" alt="Preview" class="h-full w-full object-cover">
                                </div>
                            @elseif($existing_featured_image)
                                <div class="h-16 w-28 rounded-md overflow-hidden border border-slate-200 bg-slate-50">
                                    <img src="{{ asset('storage/' . $existing_featured_image) }}" alt="Offer image" class="h-full w-full object-cover">
                                </div>
                            @else
                                <p class="text-xs text-slate-500">No image selected.</p>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="inline-flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                            <input type="checkbox" wire:model="is_active" class="rounded border-slate-300 bg-blue-500 text-blue-600 focus:ring-blue-500">
                            <span>Active Status</span>
                        </label>
                        @error('is_active')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                    <div class="flex justify-end gap-3">
                        <button
                            type="button"
                            @click="modalOpen = false"
                            class="rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50"
                        >
                            Cancel
                        </button>
                        <button
                            type="button"
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
