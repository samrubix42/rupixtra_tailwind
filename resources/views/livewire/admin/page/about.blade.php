<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">
    <h1 class="text-xl font-semibold text-slate-900">About Page Content</h1>

    <form wire:submit.prevent="save" class="space-y-6">
        <!-- Hero Section -->
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
            <h2 class="text-sm font-semibold text-slate-900">Hero Section</h2>
            <div class="space-y-3">
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Heading</label>
                    <input type="text" wire:model.defer="content.hero.heading" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Subtitle</label>
                    <input type="text" wire:model.defer="content.hero.subtitle" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Paragraph</label>
                    <textarea wire:model.defer="content.hero.paragraph" rows="4" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40"></textarea>
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
