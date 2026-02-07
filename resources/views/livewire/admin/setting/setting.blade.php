<div class="max-w-6xl mx-auto px-3 sm:px-4 lg:px-6 py-4 sm:py-6">
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-slate-900">Site Settings</h1>
        <p class="mt-1 text-sm text-slate-500">Manage branding, contact numbers and default SEO options.</p>
    </div>

    <form wire:submit.prevent="save" class="space-y-5">
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
            <div class="lg:col-span-2 space-y-5">

                <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <h2 class="text-sm font-semibold text-slate-900 mb-4">General Information</h2>

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Application Name</label>
                                <input
                                    type="text"
                                    wire:model.defer="app_name"
                                    placeholder="e.g. Rupixtra"
                                    class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                                >
                                @error('app_name')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Company Name</label>
                                <input
                                    type="text"
                                    wire:model.defer="company_name"
                                    placeholder="Your company or brand name"
                                    class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                                >
                                @error('company_name')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">CEO Name</label>
                                <input
                                    type="text"
                                    wire:model.defer="ceo_name"
                                    placeholder="e.g. John Doe"
                                    class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                                >
                                @error('ceo_name')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Support Email</label>
                                <input
                                    type="email"
                                    wire:model.defer="contact_email"
                                    placeholder="e.g. support@example.com"
                                    class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                                >
                                @error('contact_email')
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Address</label>
                            <textarea
                                wire:model.defer="contact_address"
                                rows="2"
                                placeholder="Company address (optional)"
                                class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none resize-none"
                            ></textarea>
                            @error('contact_address')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Footer Text</label>
                            <input
                                type="text"
                                wire:model.defer="footer_text"
                                placeholder="e.g. © {{ date('Y') }} Company Name. All rights reserved."
                                class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                            @error('footer_text')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <h2 class="text-sm font-semibold text-slate-900 mb-4">Contact Information</h2>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Phone Number</label>
                            <input
                                type="text"
                                wire:model.defer="phone_number"
                                placeholder="e.g. +1 555 123 4567"
                                class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                            @error('phone_number')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">WhatsApp Number</label>
                            <input
                                type="text"
                                wire:model.defer="whatsapp_number"
                                placeholder="e.g. +1 555 123 4567"
                                class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                            @error('whatsapp_number')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white p-4 sm:p-5 shadow-sm">
                    <h2 class="text-sm font-semibold text-slate-900 mb-4">Default SEO</h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">SEO Title</label>
                            <input
                                type="text"
                                wire:model.defer="seo_title"
                                placeholder="Default meta title for your site"
                                class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                            @error('seo_title')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">SEO Description</label>
                            <textarea
                                wire:model.defer="seo_description"
                                rows="3"
                                placeholder="Short description used for meta tags and social sharing."
                                class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none resize-none"
                            ></textarea>
                            @error('seo_description')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">SEO Keywords</label>
                            <input
                                type="text"
                                wire:model.defer="seo_keywords"
                                placeholder="e.g. finance, calculator, services"
                                class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                            <p class="mt-1 text-[11px] text-slate-400">Separate keywords with commas.</p>
                            @error('seo_keywords')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-5">
                <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <h2 class="text-sm font-semibold text-slate-900 mb-4">Logo</h2>

                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="h-20 w-20 rounded-lg border border-slate-200 bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center overflow-hidden shadow-sm">
                                @if ($logo)
                                    <img src="{{ $logo->temporaryUrl() }}" alt="Logo preview" class="h-full w-full object-contain">
                                @elseif ($logo_path)
                                    <img src="{{ asset('storage/' . $logo_path) }}" alt="Current logo" class="h-full w-full object-contain">
                                @else
                                    <span class="text-[10px] text-slate-400">No logo</span>
                                @endif
                            </div>

                            <div class="flex-1 text-xs text-slate-500">
                                <p class="font-medium text-slate-700 mb-0.5">Upload Logo</p>
                                <p class="mb-1">PNG with transparent background works best.</p>
                                <div class="flex items-center gap-2 text-[11px] text-slate-400">
                                    <span class="inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                                    <span>Preview updates instantly when you pick a file.</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <input
                                type="file"
                                wire:model="logo"
                                accept="image/*"
                                class="block w-full text-xs text-slate-700 file:mr-3 file:rounded-md file:border-0 file:bg-slate-800 file:px-3 file:py-1.5 file:text-xs file:font-medium file:text-white hover:file:bg-slate-700"
                            >
                            @error('logo')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror

                            <div class="flex items-center gap-2 text-[11px] text-slate-400" wire:loading wire:target="logo">
                                <span class="inline-flex h-3 w-3 rounded-full border-2 border-slate-300 border-t-slate-500 animate-spin"></span>
                                <span>Uploading logo...</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <h2 class="text-sm font-semibold text-slate-900 mb-4">Favicon</h2>

                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="h-12 w-12 rounded-lg border border-slate-200 bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center overflow-hidden shadow-sm">
                                @if ($favicon)
                                    <img src="{{ $favicon->temporaryUrl() }}" alt="Favicon preview" class="h-full w-full object-contain">
                                @elseif ($favicon_path)
                                    <img src="{{ asset('storage/' . $favicon_path) }}" alt="Current favicon" class="h-full w-full object-contain">
                                @else
                                    <span class="text-[10px] text-slate-400">No favicon</span>
                                @endif
                            </div>

                            <div class="flex-1 text-xs text-slate-500">
                                <p class="font-medium text-slate-700 mb-0.5">Upload Favicon</p>
                                <p class="mb-1">Recommended size: 32x32 PNG or ICO.</p>
                                <div class="flex items-center gap-2 text-[11px] text-slate-400">
                                    <span class="inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                                    <span>Preview updates instantly when you pick a file.</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <input
                                type="file"
                                wire:model="favicon"
                                accept="image/*"
                                class="block w-full text-xs text-slate-700 file:mr-3 file:rounded-md file:border-0 file:bg-slate-800 file:px-3 file:py-1.5 file:text-xs file:font-medium file:text-white hover:file:bg-slate-700"
                            >
                            @error('favicon')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror

                            <div class="flex items-center gap-2 text-[11px] text-slate-400" wire:loading wire:target="favicon">
                                <span class="inline-flex h-3 w-3 rounded-full border-2 border-slate-300 border-t-slate-500 animate-spin"></span>
                                <span>Uploading favicon...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button
                type="submit"
                class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1"
                wire:loading.attr="disabled"
                wire:target="save,logo,favicon"
            >
                <span wire:loading.remove>Save Settings</span>
                <span wire:loading>Saving...</span>
            </button>
        </div>
    </form>
</div>
