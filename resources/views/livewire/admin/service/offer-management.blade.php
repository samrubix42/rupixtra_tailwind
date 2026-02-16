<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <!-- Page Heading -->
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-slate-900">
            Offer Management
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Manage offer banners, URLs and featured images.
        </p>
    </div>

    <!-- Main content -->
    <div class="space-y-4">

        <!-- Top bar: search + create button -->
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full sm:max-w-xs">
                <label class="block text-xs font-medium text-slate-500 mb-1">
                    Search Offers
                </label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Search by URL..."
                        class="block w-full rounded-md border border-slate-300 bg-white pl-9 pr-3 py-2 text-sm
                               text-slate-700 placeholder:text-slate-400
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                </div>
            </div>

            <div class="flex sm:justify-end">
                <button
                    @click="$dispatch('open-modal');$wire.resetForm()"
                    class="inline-flex items-center gap-2 rounded-md bg-blue-600
                           px-4 py-2 text-sm font-medium text-white shadow-sm
                           hover:bg-blue-500 focus:outline-none focus:ring-2
                           focus:ring-blue-500/60 focus:ring-offset-1">
                    <i class="ri-add-line text-base"></i>
                    <span>Add Offer</span>
                </button>
            </div>
        </div>


        <!-- Table card (desktop & tablet) -->
        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-12">#</th>
                            <th class="px-4 py-3 w-20">Image</th>
                            <th class="px-4 py-3">URL</th>
                            <th class="px-4 py-3 w-20">Status</th>
                            <th class="px-4 py-3 w-32">Created</th>
                            <th class="px-4 py-3 text-right w-40">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($offers as $offer)
                            <tr wire:key="offer-{{ $offer->id }}" class="hover:bg-slate-50/80">
                                <td class="px-4 py-3 text-slate-500">
                                    {{ ($offers->currentPage() - 1) * $offers->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-4 py-3">
                                    @if($offer->featured_image)
                                        <img src="{{ asset('storage/' . $offer->featured_image) }}"
                                             alt="Offer Image"
                                             class="w-12 h-8 object-cover rounded border border-slate-200">
                                    @else
                                        <div class="w-12 h-8 bg-slate-100 rounded border border-slate-200 flex items-center justify-center">
                                            <i class="ri-image-line text-slate-400 text-xs"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <a href="{{ $offer->url }}" target="_blank" class="text-blue-600 hover:text-blue-800 hover:underline break-all">
                                        {{ $offer->url }}
                                    </a>
                                </td>
                                <td class="px-4 py-3">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input
                                            type="checkbox"
                                            wire:change="toggleStatus({{ $offer->id }})"
                                            {{ $offer->is_active ? 'checked' : '' }}
                                            class="sr-only peer">
                                        <div class="relative w-9 h-5 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                        <span class="ml-2 text-xs {{ $offer->is_active ? 'text-emerald-600' : 'text-slate-500' }}">
                                            {{ $offer->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </label>
                                </td>
                                <td class="px-4 py-3 text-slate-600 text-xs">
                                    {{ $offer->created_at?->format('M d, Y') }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-2">
                                        <button
                                            @click="
                                                $dispatch('open-modal');
                                                $wire.openEditModal({{ $offer->id }})
                                            "
                                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                                   text-xs font-medium text-slate-700 hover:bg-slate-100">
                                            <i class="ri-edit-line text-sm"></i>
                                            Edit
                                        </button>

                                        <button
                                            @click="
                                                $dispatch('open-delete-modal');
                                                $wire.confirmDelete({{ $offer->id }})
                                            "
                                            wire:confirm="Are you sure?"
                                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5
                                                   text-xs font-medium text-rose-600 hover:bg-rose-50">
                                            <i class="ri-delete-bin-6-line text-sm"></i>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-sm text-slate-500">
                                    @if($search !== '')
                                        No offers found matching "{{ $search }}".
                                    @else
                                        No offers found. Create your first offer.
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card list (mobile) -->
        <div class="space-y-3 sm:hidden">
            @forelse($offers as $offer)
                <div wire:key="offer-card-{{ $offer->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex gap-3 flex-1 min-w-0">
                            @if($offer->featured_image)
                                <img src="{{ asset('storage/' . $offer->featured_image) }}"
                                     alt="Offer Image"
                                     class="w-12 h-8 object-cover rounded border border-slate-200 flex-shrink-0">
                            @else
                                <div class="w-12 h-8 bg-slate-100 rounded border border-slate-200 flex items-center justify-center flex-shrink-0">
                                    <i class="ri-image-line text-slate-400 text-xs"></i>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <a href="{{ $offer->url }}" target="_blank" class="text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline break-all">
                                    {{ $offer->url }}
                                </a>
                                <div class="mt-1 flex items-center gap-3">
                                    <p class="text-[11px] text-slate-500">
                                        Created: {{ $offer->created_at?->format('M d, Y') }}
                                    </p>
                                    <div class="flex items-center gap-2">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input
                                                type="checkbox"
                                                wire:change="toggleStatus({{ $offer->id }})"
                                                {{ $offer->is_active ? 'checked' : '' }}
                                                class="sr-only peer">
                                            <div class="relative w-8 h-4 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[1px] after:left-[1px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-blue-600"></div>
                                        </label>
                                        <span class="text-[10px] {{ $offer->is_active ? 'text-emerald-600' : 'text-slate-500' }}">
                                            {{ $offer->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-end gap-2">
                        <button
                            @click="
                                $dispatch('open-modal');
                                $wire.openEditModal({{ $offer->id }})
                            "
                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                   text-xs font-medium text-slate-700 hover:bg-slate-100">
                            <i class="ri-edit-line text-sm"></i>
                            Edit
                        </button>

                        <button
                            @click="
                                $dispatch('open-delete-modal');
                                $wire.confirmDelete({{ $offer->id }})
                            "
                            wire:confirm="Are you sure?"
                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5
                                   text-xs font-medium text-rose-600 hover:bg-rose-50">
                            <i class="ri-delete-bin-6-line text-sm"></i>
                            Delete
                        </button>
                    </div>
                </div>
            @empty
                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">
                    @if($search !== '')
                        No offers found matching "{{ $search }}".
                    @else
                        No offers found. Create your first offer.
                    @endif
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-3 flex justify-end">
            {{ $offers->links() }}
        </div>

        <!-- Modal Components -->
        @include('livewire.admin.service.include.offer-modal')
        @include('livewire.admin.service.include.delete-modal')

    </div>
</div>
