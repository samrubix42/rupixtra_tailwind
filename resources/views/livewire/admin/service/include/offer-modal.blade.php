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
                        
                        <!-- File Input with Loading State -->
                        <div class="relative">
                            <input
                                type="file"
                                wire:model="featured_image"
                                accept="image/*"
                                class="block w-full text-sm text-slate-700 file:mr-4 file:rounded-md file:border-0
                                       file:bg-slate-100 file:px-3 file:py-1.5 file:text-sm file:font-medium
                                       hover:file:bg-slate-200 disabled:opacity-50"
                                wire:loading.attr="disabled"
                                wire:target="featured_image"
                            >
                            
                            <!-- Upload Loading Indicator -->
                            <div wire:loading wire:target="featured_image" 
                                 class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                <div class="flex items-center gap-2">
                                    <svg class="animate-spin h-4 w-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span class="text-xs text-blue-600">Uploading...</span>
                                </div>
                            </div>
                        </div>
                        
                        @error('featured_image')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                        
                        <!-- Upload Progress Text -->
                        <div wire:loading wire:target="featured_image" class="mt-1">
                            <p class="text-xs text-blue-600 flex items-center gap-1">
                                <i class="ri-upload-cloud-2-line"></i>
                                Processing image... Please wait.
                            </p>
                        </div>

                        <!-- Image Preview Section -->
                        <div class="mt-3">
                            <div wire:loading.remove wire:target="featured_image" class="flex items-center gap-4">
                                @if($featured_image)
                                    <div class="relative h-16 w-28 rounded-md overflow-hidden border border-slate-200 bg-slate-50">
                                        <img src="{{ $featured_image->temporaryUrl() }}" alt="Preview" class="h-full w-full object-cover">
                                        <div class="absolute top-1 right-1">
                                            <span class="bg-green-100 text-green-800 text-[10px] px-1.5 py-0.5 rounded-full">
                                                New
                                            </span>
                                        </div>
                                    </div>
                                @elseif($existing_featured_image)
                                    <div class="h-16 w-28 rounded-md overflow-hidden border border-slate-200 bg-slate-50">
                                        <img src="{{ asset('storage/' . $existing_featured_image) }}" alt="Offer image" class="h-full w-full object-cover">
                                    </div>
                                @else
                                    <div class="flex items-center gap-2 text-slate-500">
                                        <i class="ri-image-add-line text-lg"></i>
                                        <p class="text-xs">No image selected</p>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Loading Preview Placeholder -->
                            <div wire:loading wire:target="featured_image" class="flex items-center gap-4">
                                <div class="h-16 w-28 rounded-md border border-slate-200 bg-slate-100 animate-pulse flex items-center justify-center">
                                    <svg class="animate-spin h-6 w-6 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </div>
                                <p class="text-xs text-slate-500">Processing image...</p>
                            </div>
                        </div>
                        
                        <!-- Helper Text -->
                        <p class="text-xs text-slate-500 mt-2">
                            Max file size: 2MB. Supported formats: JPG, PNG, GIF, WebP
                        </p>
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

                <div class="mt-6 flex justify-end gap-3">
                    <button
                        type="button"
                        @click="modalOpen = false"
                        wire:loading.attr="disabled"
                        wire:target="save,featured_image"
                        class="rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50
                               disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        Cancel
                    </button>
                    <button
                        type="button"
                        wire:click="save"
                        wire:loading.attr="disabled"
                        wire:target="save,featured_image"
                        class="inline-flex items-center gap-1 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white
                               hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1
                               disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <!-- Default Save State -->
                        <span wire:loading.remove wire:target="save,featured_image" class="flex items-center gap-1">
                            <i class="ri-save-3-line text-base"></i>
                            {{ $offerId ? 'Update Offer' : 'Save Offer' }}
                        </span>
                        
                        <!-- Upload Loading State -->
                        <span wire:loading wire:target="featured_image" class="flex items-center gap-1">
                            <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Uploading...
                        </span>
                        
                        <!-- Save Loading State -->
                        <span wire:loading wire:target="save" class="flex items-center gap-1">
                            <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Saving...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
