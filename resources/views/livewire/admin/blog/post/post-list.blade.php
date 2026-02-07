<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6 flex items-center justify-between gap-3">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Blog Posts</h1>
            <p class="mt-1 text-sm text-slate-500">Manage blog posts with search, pagination and quick actions.</p>
        </div>

        <a wire:navigate
            href="{{ route('admin.blog.post.add') }}"
            class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1">
            <i class="ri-add-line text-base"></i>
            <span>Add Post</span>
        </a>
    </div>

    <div class="space-y-4">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full sm:max-w-xs">
                <label class="block text-xs font-medium text-slate-500 mb-1">Search Posts</label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search by title, slug or meta..."
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
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Slug</th>
                            <th class="px-4 py-3">Published</th>
                            <th class="px-4 py-3 text-right w-40">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($posts as $post)
                            <tr wire:key="post-{{ $post->id }}" class="hover:bg-slate-50/80">
                                <td class="px-4 py-3 text-slate-500">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 font-medium text-slate-800">{{ $post->title }}</td>
                                <td class="px-4 py-3 text-slate-600">{{ $post->category?->title ?? '—' }}</td>
                                <td class="px-4 py-3 text-slate-600 text-xs font-mono break-all">{{ $post->slug }}</td>
                                <td class="px-4 py-3">
                                    @if($post->is_published)
                                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Published
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                            Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-2">
                                        <a
                                            href="{{ route('admin.blog.post.edit', $post->id) }}"
                                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-100">
                                            <i class="ri-edit-line text-sm"></i>
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-sm text-slate-500">No posts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-3 sm:hidden">
            @forelse($posts as $post)
                <div wire:key="post-card-{{ $post->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $post->title }}</p>
                            <p class="mt-0.5 text-[11px] font-mono text-slate-500 break-all">{{ $post->slug }}</p>
                            <p class="mt-1 text-xs text-slate-500">{{ $post->category?->title ?? '—' }}</p>
                        </div>
                        <div class="text-right text-xs">
                            @if($post->is_published)
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-[11px] font-semibold text-emerald-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                    Published
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2 py-0.5 text-[11px] font-semibold text-slate-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                    Draft
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-end gap-2">
                        <a
                            href="{{ route('admin.blog.post.edit', $post->id) }}"
                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-100">
                            <i class="ri-edit-line text-sm"></i>
                            Edit
                        </a>
                    </div>
                </div>
            @empty
                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">
                    No posts found.
                </div>
            @endforelse
        </div>

        <div class="mt-3 flex justify-end">
            {{ $posts->links() }}
        </div>
    </div>
</div>
