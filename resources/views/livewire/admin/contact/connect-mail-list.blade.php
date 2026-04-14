<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-slate-900">Connect Mails</h1>
        <p class="mt-1 text-sm text-slate-500">View and manage newsletter/connect email submissions.</p>
    </div>

    <div class="space-y-4">
        <div class="w-full sm:w-72">
            <label class="block text-xs font-medium text-slate-500 mb-1">Search Email</label>
            <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                    <i class="ri-search-line"></i>
                </span>
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search by email..."
                    class="block w-full h-10 rounded-md border border-slate-300 bg-white pl-9 pr-3 text-sm
                           text-slate-700 placeholder:text-slate-400
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
            </div>
        </div>

        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-14">#</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Submitted At</th>
                            <th class="px-4 py-3 text-right w-32">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($connectMails as $connectMail)
                            <tr wire:key="connect-mail-{{ $connectMail->id }}" class="hover:bg-slate-50/80">
                                <td class="px-4 py-3 text-slate-500">
                                    {{ $connectMails->firstItem() + $loop->index }}
                                </td>
                                <td class="px-4 py-3 font-medium text-slate-800">
                                    {{ $connectMail->email }}
                                </td>
                                <td class="px-4 py-3 text-slate-600">
                                    {{ optional($connectMail->created_at)->format('d M Y, h:i A') }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <button
                                        wire:click="confirmDelete({{ $connectMail->id }})"
                                        class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5
                                               text-xs font-medium text-rose-600 hover:bg-rose-50">
                                        <i class="ri-delete-bin-6-line text-sm"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-8 text-center text-sm text-slate-500">
                                    No connect mails found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-3 sm:hidden">
            @forelse($connectMails as $connectMail)
                <div wire:key="connect-mail-card-{{ $connectMail->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <p class="text-sm font-semibold text-slate-900">{{ $connectMail->email }}</p>
                    <p class="mt-1 text-xs text-slate-500">{{ optional($connectMail->created_at)->format('d M Y, h:i A') }}</p>
                    <div class="mt-3 flex justify-end">
                        <button
                            wire:click="confirmDelete({{ $connectMail->id }})"
                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5
                                   text-xs font-medium text-rose-600 hover:bg-rose-50">
                            <i class="ri-delete-bin-6-line text-sm"></i>
                            Delete
                        </button>
                    </div>
                </div>
            @empty
                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">
                    No connect mails found.
                </div>
            @endforelse
        </div>

        <div class="mt-3 flex justify-end">
            {{ $connectMails->links() }}
        </div>
    </div>

    @if($deleteId)
        <div
            x-data="{ open: true }"
            x-show="open"
            x-cloak
            class="fixed inset-0 z-40 flex items-center justify-center bg-black/40">
            <div
                @click.away="open = false; $wire.cancelDelete()"
                class="w-full max-w-sm rounded-xl bg-white p-5 shadow-xl">
                <h2 class="text-base font-semibold text-slate-900">Delete connect mail?</h2>
                <p class="mt-2 text-xs text-slate-500">This action cannot be undone.</p>

                <div class="mt-5 flex justify-end gap-2 text-xs">
                    <button
                        @click="open = false; $wire.cancelDelete()"
                        class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-3 py-1.5
                               font-medium text-slate-700 hover:bg-slate-100">
                        Cancel
                    </button>
                    <button
                        wire:click="deleteConfirmed"
                        class="inline-flex items-center gap-1 rounded-md border border-rose-200 bg-rose-600 px-3 py-1.5
                               font-medium text-white hover:bg-rose-500">
                        <i class="ri-delete-bin-6-line text-sm"></i>
                        Delete
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
