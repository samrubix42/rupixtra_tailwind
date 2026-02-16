<div class="space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Dashboard</h1>
            <p class="mt-1 text-sm text-slate-500">Overview of your content and enquiries.</p>
        </div>

        
    </div>

    <!-- Stat cards -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-slate-500">Total Users</p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $stats['total_users'] ?? 0 }}</p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-slate-500">Published Posts</p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $stats['published_posts'] ?? 0 }}</p>
            <p class="mt-1 text-xs text-slate-500">Total: {{ $stats['total_posts'] ?? 0 }} | Drafts: {{ $stats['draft_posts'] ?? 0 }}</p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-slate-500">Services</p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $stats['total_services'] ?? 0 }}</p>
            <p class="mt-1 text-xs text-slate-500">Testimonials: {{ $stats['total_testimonials'] ?? 0 }}</p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-slate-500">Enquiries</p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $stats['total_contacts'] ?? 0 }}</p>
            <p class="mt-1 text-xs text-rose-600">Unread: {{ $stats['unread_contacts'] ?? 0 }}</p>
        </div>
    </div>

    <!-- Recent activity -->
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">

        <!-- Recent enquiries -->
        <div class="rounded-xl border border-slate-200 bg-white p-4 sm:p-5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-sm font-semibold text-slate-900">Recent Enquiries</h2>
                <span class="text-[11px] text-slate-500">Last 5</span>
            </div>

            @if($recentContacts->isEmpty())
                <p class="text-xs text-slate-500">No enquiries yet.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-xs">
                        <thead class="border-b border-slate-200 text-[11px] uppercase text-slate-500">
                        <tr>
                            <th class="py-2 pr-4">Name</th>
                            <th class="py-2 pr-4">Email</th>
                            <th class="py-2 pr-4">Phone</th>
                            <th class="py-2">Status</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                        @foreach($recentContacts as $contact)
                            <tr>
                                <td class="py-2 pr-4 font-medium text-slate-800">{{ $contact->name }}</td>
                                <td class="py-2 pr-4 text-slate-600">{{ $contact->email ?? '—' }}</td>
                                <td class="py-2 pr-4 text-slate-600">{{ $contact->phone ?? '—' }}</td>
                                <td class="py-2">
                                    @if($contact->is_read)
                                        <span class="inline-flex items-center rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">Read</span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-rose-50 px-2 py-0.5 text-[11px] font-medium text-rose-700">New</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Recent posts -->
        <div class="rounded-xl border border-slate-200 bg-white p-4 sm:p-5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-sm font-semibold text-slate-900">Recent Posts</h2>
                <span class="text-[11px] text-slate-500">Last 5 published</span>
            </div>

            @if($recentPosts->isEmpty())
                <p class="text-xs text-slate-500">No posts yet.</p>
            @else
                <ul class="divide-y divide-slate-100 text-xs">
                    @foreach($recentPosts as $post)
                        <li class="py-2 flex items-start justify-between gap-3">
                            <div>
                                <p class="font-medium text-slate-800">{{ $post->title }}</p>
                                <p class="mt-0.5 text-[11px] text-slate-500">{{ optional($post->created_at)->format('d M Y') }}</p>
                            </div>
                            <span class="inline-flex items-center rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">Published</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>

</div>
