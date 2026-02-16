<div class="space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-blue">Dashboard</h1>
            <p class="mt-1 text-sm text-slate-500">Quick overview of your site activity.</p>
        </div>

        <div class="flex items-center gap-2 text-xs text-slate-500 bg-cyan/10 px-3 py-1.5 rounded-full">
            <i class="ri-calendar-line text-blue"></i>
            <span>{{ now()->format('d M Y') }}</span>
        </div>
    </div>

    <!-- Stat cards -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl bg-gradient-to-br from-cyan-50 via-white to-blue-50 p-4 shadow-sm border border-cyan/30 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-medium text-slate-500 tracking-wide uppercase">Total Users</p>
                <p class="mt-2 text-2xl font-bold text-blue">{{ $stats['total_users'] ?? 0 }}</p>
            </div>
            <div class="h-10 w-10 rounded-full bg-cyan/20 flex items-center justify-center text-blue">
                <i class="ri-user-3-line text-lg"></i>
            </div>
        </div>

        <div class="rounded-2xl bg-gradient-to-br from-emerald-50 via-white to-cyan-50 p-4 shadow-sm border border-emerald-100 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-medium text-slate-500 tracking-wide uppercase">Published Posts</p>
                <p class="mt-2 text-2xl font-bold text-emerald-700">{{ $stats['published_posts'] ?? 0 }}</p>
                <p class="mt-1 text-[11px] text-slate-500">Total: {{ $stats['total_posts'] ?? 0 }} · Drafts: {{ $stats['draft_posts'] ?? 0 }}</p>
            </div>
            <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700">
                <i class="ri-article-line text-lg"></i>
            </div>
        </div>

        <div class="rounded-2xl bg-gradient-to-br from-indigo-50 via-white to-cyan-50 p-4 shadow-sm border border-indigo-100 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-medium text-slate-500 tracking-wide uppercase">Services</p>
                <p class="mt-2 text-2xl font-bold text-indigo-700">{{ $stats['total_services'] ?? 0 }}</p>
                <p class="mt-1 text-[11px] text-slate-500">Testimonials: {{ $stats['total_testimonials'] ?? 0 }}</p>
            </div>
            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700">
                <i class="ri-briefcase-line text-lg"></i>
            </div>
        </div>

        <div class="rounded-2xl bg-gradient-to-br from-rose-50 via-white to-amber-50 p-4 shadow-sm border border-rose-100 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-medium text-slate-500 tracking-wide uppercase">Enquiries</p>
                <p class="mt-2 text-2xl font-bold text-rose-700">{{ $stats['total_contacts'] ?? 0 }}</p>
                <p class="mt-1 text-[11px] text-rose-600 font-medium">Unread: {{ $stats['unread_contacts'] ?? 0 }}</p>
            </div>
            <div class="h-10 w-10 rounded-full bg-rose-100 flex items-center justify-center text-rose-700">
                <i class="ri-chat-1-line text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Recent activity -->
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">

        <!-- Recent enquiries -->
        <div class="rounded-2xl border border-cyan/30 bg-white/80 backdrop-blur-sm p-4 sm:p-5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2">
                    <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-cyan/15 text-blue">
                        <i class="ri-phone-line text-sm"></i>
                    </span>
                    <h2 class="text-sm font-semibold text-slate-900">Recent Enquiries</h2>
                </div>
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
        <div class="rounded-2xl border border-emerald-100 bg-white/80 backdrop-blur-sm p-4 sm:p-5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2">
                    <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                        <i class="ri-file-list-3-line text-sm"></i>
                    </span>
                    <h2 class="text-sm font-semibold text-slate-900">Recent Posts</h2>
                </div>
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
