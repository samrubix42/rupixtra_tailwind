<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div class="space-y-1">
            <h1 class="text-xl font-semibold text-slate-900">Services</h1>
            <p class="mt-1 text-sm text-slate-500">Manage services, lenders and quick actions.</p>
        </div>

        <a
            href="{{ route('admin.services.add') }}"
            class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1">
            <i class="ri-add-line text-base"></i>
            <span>Add Service</span>
        </a>
    </div>

    <div class="space-y-4">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full sm:max-w-xs">
                <label class="block text-xs font-medium text-slate-500 mb-1">Search Services</label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search by title or slug..."
                        class="block w-full rounded-md border border-slate-300 bg-white pl-9 pr-3 py-2 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                </div>
            </div>

            <div class="flex items-center justify-between sm:justify-end gap-3">
                <div class="flex items-center gap-2 text-xs text-slate-600">
                    <span>Rows per page</span>
                    <select
                        wire:model.live="perPage"
                        class="rounded-md border border-slate-300 bg-white px-2 py-1 text-xs text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                        @foreach($perPageOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-12">#</th>
                            <th class="px-4 py-3">Service</th>
                            <th class="px-4 py-3">Slug</th>
                            <th class="px-4 py-3">Lenders</th>
                            <th class="px-4 py-3">Updated</th>
                            <th class="px-4 py-3 text-right w-48">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse ($services as $service)
                            <tr wire:key="service-{{ $service->id }}" class="hover:bg-slate-50/80">
                                <td class="px-4 py-3 text-slate-500">
                                    {{ $loop->iteration + ($services->currentPage() - 1) * $services->perPage() }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-col">
                                        <span class="font-medium text-slate-800">{{ $service->title }}</span>
                                        @if($service->featured_image)
                                            <span class="mt-1 inline-flex items-center gap-1 text-[11px] text-slate-500">
                                                <i class="ri-image-line"></i>
                                                Featured image
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-slate-600 text-xs font-mono break-all">
                                    {{ $service->slug }}
                                </td>
                                <td class="px-4 py-3">
                                    @php $lendersCount = $service->lenders_count ?? $service->lenders()->count(); @endphp
                                    @if($lendersCount > 0)
                                        <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-700">
                                            <i class="ri-building-line text-sm"></i>
                                            {{ $lendersCount }} Lender{{ $lendersCount > 1 ? 's' : '' }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full bg-slate-50 px-2.5 py-1 text-xs font-medium text-slate-500">
                                            <i class="ri-building-line text-sm"></i>
                                            No lenders
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-slate-600 text-xs">
                                    {{ $service->updated_at?->format('d M Y') ?? '—' }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-2">
                                        <a
                                            href="{{ route('admin.services.edit', $service->id) }}"
                                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-100">
                                            <i class="ri-edit-line text-sm"></i>
                                            Edit
                                        </a>

                                        <button
                                            @click="$dispatch('open-delete-modal');$wire.confirmDelete({{ $service->id }})"
                                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5 text-xs font-medium text-rose-600 hover:bg-rose-50">
                                            <i class="ri-delete-bin-6-line text-sm"></i>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-sm text-slate-500">No services found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-3 sm:hidden">
            @forelse ($services as $service)
                <div wire:key="service-card-{{ $service->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-slate-900">{{ $service->title }}</p>
                            <p class="mt-0.5 text-[11px] font-mono text-slate-500 break-all">{{ $service->slug }}</p>
                            @php $lendersCount = $service->lenders_count ?? $service->lenders()->count(); @endphp
                            <p class="mt-1 text-xs text-slate-600 flex items-center gap-1">
                                <i class="ri-building-line text-sm"></i>
                                <span>{{ $lendersCount }} lender{{ $lendersCount === 1 ? '' : 's' }}</span>
                            </p>
                        </div>
                        <div class="text-xs text-slate-500 flex-shrink-0">
                            <span class="block">Updated</span>
                            <span class="font-medium">{{ $service->updated_at?->format('d M Y') ?? '—' }}</span>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-end gap-2">
                        <a
                            href="{{ route('admin.services.edit', $service->id) }}"
                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-100">
                            <i class="ri-edit-line text-sm"></i>
                            Edit
                        </a>

                        <button
                            @click="$dispatch('open-delete-modal');$wire.confirmDelete({{ $service->id }})"
                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5 text-xs font-medium text-rose-600 hover:bg-rose-50">
                            <i class="ri-delete-bin-6-line text-sm"></i>
                            Delete
                        </button>
                    </div>
                </div>
            @empty
                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">
                    No services found.
                </div>
            @endforelse
        </div>

        <div class="mt-3 flex justify-end">
            {{ $services->links() }}
        </div>

        <div
            x-data="{ open: false }"
            x-on:open-delete-modal.window="open = true"
            x-on:close-modal.window="open = false"
            x-show="open"
            x-cloak
            class="fixed inset-0 z-30 flex items-center justify-center bg-black/40">
            <div @click.away="open = false;$wire.cancelDelete()" class="bg-white rounded-lg shadow-xl max-w-sm w-full p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-2">Delete Service</h2>
                <p class="text-sm text-slate-600 mb-4">Are you sure you want to delete this service? This action cannot be undone.</p>
                <div class="flex justify-end gap-3">
                    <button type="button" @click="open = false;$wire.cancelDelete()" class="px-4 py-2 text-sm font-medium text-slate-700 bg-slate-100 rounded-md hover:bg-slate-200">
                        Cancel
                    </button>
                    <button type="button" wire:click="deleteConfirmed" class="px-4 py-2 text-sm font-medium text-white bg-rose-600 rounded-md hover:bg-rose-700">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
