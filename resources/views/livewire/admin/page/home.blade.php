<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">
    <h1 class="text-xl font-semibold text-slate-900">Home Page Content</h1>

    <form wire:submit.prevent="save" class="space-y-6">
        <!-- Hero Section -->
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
            <h2 class="text-sm font-semibold text-slate-900">Hero Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Heading 1</label>
                    <input type="text" wire:model.defer="content.hero.heading1" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Heading 2</label>
                    <input type="text" wire:model.defer="content.hero.heading2" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Subtitle 1</label>
                    <input type="text" wire:model.defer="content.hero.subtitle1" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Subtitle 2</label>
                    <input type="text" wire:model.defer="content.hero.subtitle2" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40">
                </div>
                    <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-slate-500 mb-1">Paragraph</label>
                    <textarea wire:model.defer="content.hero.para" rows="3" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40"></textarea>
                </div>
                <div class="md:col-span-2 space-y-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                        <div>
                            <label class="block text-xs font-medium text-slate-500 mb-1">Upload Hero Image</label>
                            <input type="file" wire:model="heroImage" accept="image/*" class="block w-full text-xs text-slate-600 file:mr-3 file:rounded-md file:border-0 file:bg-slate-100 file:px-3 file:py-1.5 file:text-xs file:font-medium file:text-slate-700 hover:file:bg-slate-200">
                            @error('heroImage')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-[11px] text-slate-500">Upload an image to update the hero banner.</p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="text-xs font-medium text-slate-500">Current / New Preview</span>
                            <div class="border border-dashed border-slate-200 rounded-lg p-2 flex items-center justify-center bg-slate-50 min-h-[120px]">
                                @if($heroImage)
                                    <img src="{{ $heroImage->temporaryUrl() }}" alt="Hero preview" class="max-h-32 rounded-md object-contain">
                                @elseif(!empty($content['hero']['image']))
                                    <img src="{{ $content['hero']['image'] }}" alt="Hero" class="max-h-32 rounded-md object-contain">
                                @else
                                    <span class="text-[11px] text-slate-400">No image selected</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
            <h2 class="text-sm font-semibold text-slate-900">Services Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Title</label>
                    <input type="text" wire:model.defer="content.services.title" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Subtitle</label>
                    <textarea wire:model.defer="content.services.subtitle" rows="3" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40"></textarea>
                </div>
            </div>
        </div>

        <!-- Email Section -->
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
            <h2 class="text-sm font-semibold text-slate-900">Email Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Title</label>
                    <input type="text" wire:model.defer="content.email.title" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Subtitle</label>
                    <textarea wire:model.defer="content.email.subtitle" rows="3" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40"></textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1">
                <i class="ri-save-2-line text-base"></i>
                <span>Save Changes</span>
            </button>
        </div>
    </form>
</div>
