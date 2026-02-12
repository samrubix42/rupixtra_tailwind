<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <!-- Page Heading -->
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-slate-900">
            Contacts
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            View and manage contact form submissions.
        </p>
    </div>

    <div class="space-y-4">

        <!-- Top bar: search -->
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full sm:max-w-xs">
                <label class="block text-xs font-medium text-slate-500 mb-1">
                    Search Contacts
                </label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search by name, email, phone, country..."
                        class="block w-full rounded-md border border-slate-300 bg-white pl-9 pr-3 py-2 text-sm
                               text-slate-700 placeholder:text-slate-400
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                </div>
            </div>
        </div>

        <!-- Table (desktop & tablet) -->
        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-12">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Phone</th>
                            <th class="px-4 py-3">Country</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right w-48">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($contacts as $contact)
                            <tr wire:key="contact-{{ $contact->id }}" class="hover:bg-slate-50/80">
                                <td class="px-4 py-3 text-slate-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 font-medium text-slate-800">
                                    {{ $contact->name }}
                                </td>
                                <td class="px-4 py-3 text-slate-600">
                                    {{ $contact->email ?? '—' }}
                                </td>
                                <td class="px-4 py-3 text-slate-600">
                                    {{ $contact->phone ?? '—' }}
                                </td>
                                <td class="px-4 py-3 text-slate-600">
                                    {{ $contact->country ?? '—' }}
                                </td>
                                <td class="px-4 py-3">
                                    @if($contact->is_read)
                                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Read
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                            New
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-wrap items-center justify-end gap-2">
                                        <button
                                              wire:click="viewMessage({{ $contact->id }})"
                                              class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                                  text-xs font-medium text-slate-700 hover:bg-slate-100 whitespace-nowrap">
                                            <i class="ri-eye-line text-sm"></i>
                                            View
                                        </button>

                                        @if(! $contact->is_read)
                                            <button
                                                      wire:click="markAsRead({{ $contact->id }})"
                                                      class="inline-flex items-center gap-1 rounded-md border border-emerald-200 px-2.5 py-1.5
                                                          text-[11px] font-medium text-emerald-700 hover:bg-emerald-50 whitespace-nowrap">
                                                <i class="ri-check-line text-sm"></i>
                                                Mark read
                                            </button>
                                        @else
                                            <button
                                                      wire:click="markAsUnread({{ $contact->id }})"
                                                      class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                                          text-[11px] font-medium text-slate-700 hover:bg-slate-100 whitespace-nowrap">
                                                <i class="ri-refresh-line text-sm"></i>
                                                Mark unread
                                            </button>
                                        @endif

                                        <button
                                              wire:click="confirmDelete({{ $contact->id }})"
                                              class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5
                                                  text-xs font-medium text-rose-600 hover:bg-rose-50 whitespace-nowrap">
                                            <i class="ri-delete-bin-6-line text-sm"></i>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-sm text-slate-500">
                                    No contacts found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card list (mobile) -->
        <div class="space-y-3 sm:hidden">
            @forelse($contacts as $contact)
                <div wire:key="contact-card-{{ $contact->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">
                                {{ $contact->name }}
                            </p>
                            <p class="mt-0.5 text-xs text-slate-500">
                                {{ $contact->email ?? 'No email' }}
                            </p>
                            <p class="mt-0.5 text-xs text-slate-500">
                                {{ $contact->phone ?? 'No phone' }}
                            </p>
                        </div>

                        <div class="text-right text-xs">
                            @if($contact->is_read)
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-[11px] font-semibold text-emerald-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                    Read
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2 py-0.5 text-[11px] font-semibold text-blue-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                    New
                                </span>
                            @endif
                        </div>
                    </div>

                    @if($contact->message)
                        <p class="mt-3 text-xs text-slate-600 line-clamp-3">
                            {{ $contact->message }}
                        </p>
                    @endif

                    <div class="mt-4 flex items-center justify-end gap-2">
                        <button
                            wire:click="viewMessage({{ $contact->id }})"
                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                   text-xs font-medium text-slate-700 hover:bg-slate-100">
                            <i class="ri-eye-line text-sm"></i>
                            View
                        </button>

                        <button
                            wire:click="confirmDelete({{ $contact->id }})"
                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5
                                   text-xs font-medium text-rose-600 hover:bg-rose-50">
                            <i class="ri-delete-bin-6-line text-sm"></i>
                            Delete
                        </button>
                    </div>
                </div>
            @empty
                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">
                    No contacts found.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-3 flex justify-end">
            {{ $contacts->links() }}
        </div>

        <!-- View Message Modal -->
        @if($selectedContact)
            <div
                x-data="{ open: true }"
                x-show="open"
                x-cloak
                class="fixed inset-0 z-40 flex items-center justify-center bg-black/40">
                <div
                    @click.away="open = false; $wire.closeView()"
                    class="w-full max-w-lg rounded-xl bg-white p-6 shadow-xl">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">
                                Contact Details
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Submitted on {{ optional($selectedContact->created_at)->format('d M Y, h:i A') }}
                            </p>
                        </div>

                        <button
                            @click="open = false; $wire.closeView()"
                            class="text-slate-400 hover:text-slate-600">
                            <i class="ri-close-line text-xl"></i>
                        </button>
                    </div>

                    <div class="mt-4 space-y-3 text-sm text-slate-700">
                        <div>
                            <span class="font-semibold">Name:</span>
                            <span class="ml-1">{{ $selectedContact->name }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Email:</span>
                            <span class="ml-1">{{ $selectedContact->email ?? '—' }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Phone:</span>
                            <span class="ml-1">{{ $selectedContact->phone ?? '—' }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Country:</span>
                            <span class="ml-1">{{ $selectedContact->country ?? '—' }}</span>
                        </div>
                        <div class="pt-2 border-t border-slate-100">
                            <span class="font-semibold block mb-1">Message:</span>
                            <p class="whitespace-pre-line text-slate-700 text-sm">
                                {{ $selectedContact->message ?? '—' }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-2">
                        @if(! $selectedContact->is_read)
                            <button
                                wire:click="markAsRead({{ $selectedContact->id }})"
                                class="inline-flex items-center gap-1 rounded-md border border-emerald-200 px-3 py-1.5
                                       text-xs font-medium text-emerald-700 hover:bg-emerald-50">
                                <i class="ri-check-line text-sm"></i>
                                Mark as read
                            </button>
                        @endif

                        <button
                            @click="open = false; $wire.closeView()"
                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-3 py-1.5
                                   text-xs font-medium text-slate-700 hover:bg-slate-100">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Simple Delete Confirmation (inline) -->
        @if($deleteId)
            <div
                x-data="{ open: true }"
                x-show="open"
                x-cloak
                class="fixed inset-0 z-40 flex items-center justify-center bg-black/40">
                <div
                    @click.away="open = false; $wire.cancelDelete()"
                    class="w-full max-w-sm rounded-xl bg-white p-5 shadow-xl">
                    <h2 class="text-base font-semibold text-slate-900">
                        Delete contact?
                    </h2>
                    <p class="mt-2 text-xs text-slate-500">
                        This action cannot be undone.
                    </p>

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
</div>
