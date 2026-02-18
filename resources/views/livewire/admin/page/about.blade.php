<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">
    <h1 class="text-xl font-semibold text-slate-900">About Page Content</h1>

    <form wire:submit.prevent="save" class="space-y-6">
        <!-- (Hero section removed) -->
        @if(isset($content['stats']))
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
            <h2 class="text-sm font-semibold text-slate-900">Statistics</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @for($i = 0; $i < 4; $i++)
                <div class="space-y-2">
                    <label class="block text-xs font-medium text-slate-500 mb-1">Value</label>
                    <input type="text" wire:model.defer="content.stats.{{ $i }}.value" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40">
                    <label class="block text-xs font-medium text-slate-500 mb-1 mt-2">Label</label>
                    <input type="text" wire:model.defer="content.stats.{{ $i }}.label" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40">
                </div>
                @endfor
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1">
                <i class="ri-save-2-line text-base"></i>
                <span>Save Changes</span>
            </button>
        </div>
        @else
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1">
                <i class="ri-save-2-line text-base"></i>
                <span>Save Changes</span>
            </button>
        </div>
        @endif
    </form>
</div>
