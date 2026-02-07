<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6 flex items-center justify-between gap-3">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Create Post</h1>
            <p class="mt-1 text-sm text-slate-500">Add a new blog post with SEO meta and content.</p>
        </div>

        <a href="{{ route('admin.blog-list') }}" class="inline-flex items-center gap-2 rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
            <i class="ri-arrow-left-line text-base"></i>
            <span>Back to list</span>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-4">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 space-y-4">
                <div>
                    <label class="block text-xs font-medium text-slate-600 mb-1">Title</label>
                    <input
                        type="text"
                        wire:model.live="title"
                        placeholder="Post title"
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                    @error('title')<span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>@enderror
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-600 mb-1">Slug</label>
                    <input
                        type="text"
                        wire:model="slug"
                        placeholder="auto-generated or custom slug"
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                    @error('slug')<span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>@enderror
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-600 mb-1">Category</label>
                    <select
                        wire:model="category_id"
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                        <option value="">Select category (optional)</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 space-y-3">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-semibold text-slate-900">Content</h2>
                    <p class="text-xs text-slate-400">Powered by CKEditor</p>
                </div>

                <div wire:ignore x-data x-init="
                    if (window.ClassicEditor) {
                        ClassicEditor
                            .create($refs.editor, {
                                toolbar: [
                                    'heading',
                                    '|',
                                    'bold', 'italic', 'underline', 'strikethrough',
                                    'link',
                                    'bulletedList', 'numberedList', 'blockQuote',
                                    'insertTable', 'imageUpload', 'mediaEmbed',
                                    '|',
                                    'alignment', 'outdent', 'indent', 'horizontalLine',
                                    '|',
                                    'undo', 'redo', 'removeFormat'
                                ],
                                heading: {
                                    options: [
                                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                                    ]
                                }
                            })
                            .then(editor => {
                                editor.model.document.on('change:data', () => {
                                    $wire.set('content', editor.getData());
                                });
                            })
                            .catch(error => console.error(error));
                    }
                ">
                    <textarea
                        x-ref="editor"
                        class="w-full border border-slate-200 rounded-md text-sm"
                    >{!! $content !!}</textarea>
                </div>
                @error('content')<span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="space-y-4">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 space-y-3">
                <h2 class="text-sm font-semibold text-slate-900">Publish</h2>

                <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                    <input type="checkbox" wire:model="is_published" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                    <span>Published</span>
                </label>

                <div class="pt-4 flex justify-end">
                    <button
                        wire:click="save"
                        wire:loading.attr="disabled"
                        wire:target="save,featured_image"
                        class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1 disabled:opacity-70">
                        <span
                            wire:loading
                            wire:target="save"
                            class="inline-block h-4 w-4 border-2 border-white border-t-transparent rounded-full animate-spin"></span>
                        <span wire:loading.remove wire:target="save">Save Post</span>
                        <span wire:loading wire:target="save">Saving...</span>
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 space-y-3">
                <h2 class="text-sm font-semibold text-slate-900">SEO Meta</h2>

                <div>
                    <label class="block text-xs font-medium text-slate-600 mb-1">Meta Title</label>
                    <input
                        type="text"
                        wire:model="meta_title"
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                    @error('meta_title')<span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>@enderror
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-600 mb-1">Meta Description</label>
                    <textarea
                        rows="2"
                        wire:model="meta_description"
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"></textarea>
                    @error('meta_description')<span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>@enderror
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-600 mb-1">Meta Keywords</label>
                    <input
                        type="text"
                        wire:model="meta_keywords"
                        placeholder="keyword1, keyword2"
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                    @error('meta_keywords')<span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 space-y-3">
                <h2 class="text-sm font-semibold text-slate-900">Extras</h2>

                <div>
                    <label class="block text-xs font-medium text-slate-600 mb-1">Tags</label>
                    <input
                        type="text"
                        wire:model="tags"
                        placeholder="tag1, tag2"
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                    @error('tags')<span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>@enderror
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-600 mb-1">Featured Image</label>
                    <input
                        type="file"
                        wire:model="featured_image"
                        accept="image/*"
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none file:mr-3 file:py-1 file:px-2 file:rounded file:border-0 file:bg-slate-100 file:text-xs file:text-slate-700">
                    @error('featured_image')<span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span>@enderror

                    <div wire:loading wire:target="featured_image" class="mt-1 text-xs text-slate-500">
                        Uploading image...
                    </div>

                    @if ($featured_image)
                        <div class="mt-3">
                            <p class="text-xs text-slate-500 mb-1">Preview</p>
                            <img src="{{ $featured_image->temporaryUrl() }}" class="h-32 w-full object-cover rounded-md border border-slate-200">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
