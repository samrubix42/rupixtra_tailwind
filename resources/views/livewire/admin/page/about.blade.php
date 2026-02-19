<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">
    <h1 class="text-xl font-semibold text-slate-900">About Page Content</h1>

    <form x-data @submit.prevent="if (window.heroEditor) { $wire.set('content.hero.body', window.heroEditor.getContent()) } $wire.save()" class="space-y-6">
        <!-- Hero section -->
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-md space-y-4">
            <h2 class="text-lg font-semibold text-slate-900">Hero</h2>
            <div class="grid grid-cols-1 gap-3">
                <label class="block text-xs font-medium text-slate-500">Title</label>
                <input type="text" wire:model.defer="content.hero.title" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm">

                <!-- subtitle removed per request -->

                <label class="block text-xs font-medium text-slate-500">Body (rich text)</label>
                <div wire:ignore
                     x-data="{ value: @entangle('content.hero.body') }"
                     x-init="
                        (function(){
                            function initEditor(){
                                if (!window.tinymce) return;
                                tinymce.init({
                                    target: $refs.tinymce,
                                    height: 260,
                                    menubar: false,
                                    plugins: [
                                        'link image lists media table'
                                    ],
                                    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image',
                                    setup: function (editor) {
                                        editor.on('blur', function () {
                                            value = editor.getContent();
                                        });

                                        // expose instance for form submit sync
                                        editor.on('init', function () { window.heroEditor = editor; });

                                        editor.on('init', function () {
                                            if (value != null) {
                                                editor.setContent(value);
                                            }
                                        });

                                        function putCursorToEnd() {
                                            editor.selection.select(editor.getBody(), true);
                                            editor.selection.collapse(false);
                                        }

                                        $watch('value', function (newValue) {
                                            if (newValue !== editor.getContent()) {
                                                editor.setContent(newValue || '');
                                                putCursorToEnd();
                                            }
                                        });
                                    }
                                });
                            }

                            if (window.tinymce) {
                                initEditor();
                            } else {
                                var s = document.createElement('script');
                                s.src = 'https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js';
                                s.referrerPolicy = 'origin';
                                s.onload = function(){ initEditor(); };
                                s.onerror = function(e){ console.error('Failed to load TinyMCE', e); };
                                document.head.appendChild(s);
                            }
                        })()
                     "
                >
                    <textarea x-ref="tinymce" class="w-full border border-slate-200 rounded-md text-sm">{!! $content['hero']['body'] ?? '' !!}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                    <div>
                        <label class="block text-xs font-medium text-slate-500">Choose image</label>
                        <input type="file" wire:model="heroImage" accept="image/*" class="mt-2">

                        <div class="mt-2 text-sm text-slate-500">
                            <div wire:loading wire:target="heroImage" class="flex items-center gap-2 text-blue-600">
                                <svg class="w-4 h-4 animate-spin text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path></svg>
                                Uploading...
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-500">Preview</label>
                        <div class="mt-2 w-32 h-20 bg-slate-50 rounded-md border border-slate-200 flex items-center justify-center overflow-hidden">
                            @if($heroImage)
                                <img src="{{ $heroImage->temporaryUrl() }}" class="object-cover w-full h-full">
                            @elseif(!empty($content['hero']['image']))
                                <img src="{{ $content['hero']['image'] }}" class="object-cover w-full h-full">
                            @else
                                <span class="text-slate-400">No image</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ethos -->
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
            <h2 class="text-sm font-semibold text-slate-900">Our Ethos</h2>
            <label class="block text-xs font-medium text-slate-500">Title</label>
            <input type="text" wire:model.defer="content.ethos.title" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm">

            <label class="block text-xs font-medium text-slate-500 mt-2">Paragraph</label>
            <textarea rows="4" wire:model.defer="content.ethos.paragraph" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm">{{ $content['ethos']['paragraph'] ?? '' }}</textarea>

            <label class="block text-xs font-medium text-slate-500 mt-2">Points</label>
            <div class="space-y-2">
                @foreach($content['ethos']['points'] ?? [] as $i => $point)
                <div class="flex items-center gap-2">
                    <input type="text" wire:model.defer="content.ethos.points.{{ $i }}" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                    <button type="button" wire:click.prevent="removePoint('ethos', {{ $i }})" class="text-red-600">Remove</button>
                </div>
                @endforeach
                <button type="button" wire:click.prevent="addPoint('ethos')" class="mt-2 inline-flex items-center gap-2 rounded-md bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-500">Add Point</button>
            </div>
        </div>

        <!-- Mission -->
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
            <h2 class="text-sm font-semibold text-slate-900">Our Mission</h2>
            <label class="block text-xs font-medium text-slate-500">Title</label>
            <input type="text" wire:model.defer="content.mission.title" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm">

            <label class="block text-xs font-medium text-slate-500 mt-2">Paragraph</label>
            <textarea rows="4" wire:model.defer="content.mission.paragraph" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm">{{ $content['mission']['paragraph'] ?? '' }}</textarea>

            <label class="block text-xs font-medium text-slate-500 mt-2">Points</label>
            <div class="space-y-2">
                @foreach($content['mission']['points'] ?? [] as $i => $point)
                <div class="flex items-center gap-2">
                    <input type="text" wire:model.defer="content.mission.points.{{ $i }}" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                    <button type="button" wire:click.prevent="removePoint('mission', {{ $i }})" class="text-red-600">Remove</button>
                </div>
                @endforeach
                <button type="button" wire:click.prevent="addPoint('mission')" class="mt-2 inline-flex items-center gap-2 rounded-md bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-500">Add Point</button>
            </div>
        </div>

        <!-- Vision -->
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
            <h2 class="text-sm font-semibold text-slate-900">Our Vision</h2>
            <label class="block text-xs font-medium text-slate-500 mt-2">Paragraph</label>
            <textarea rows="4" wire:model.defer="content.vision.paragraph" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm">{{ $content['vision']['paragraph'] ?? '' }}</textarea>

            <label class="block text-xs font-medium text-slate-500 mt-2">Points</label>
            <div class="space-y-2">
                @foreach($content['vision']['points'] ?? [] as $i => $point)
                <div class="flex items-center gap-2">
                    <input type="text" wire:model.defer="content.vision.points.{{ $i }}" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                    <button type="button" wire:click.prevent="removePoint('vision', {{ $i }})" class="text-red-600">Remove</button>
                </div>
                @endforeach
                <button type="button" wire:click.prevent="addPoint('vision')" class="mt-2 inline-flex items-center gap-2 rounded-md bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-500">Add Point</button>
            </div>
        </div>

        <!-- Strengths -->
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
            <h2 class="text-sm font-semibold text-slate-900">Our Strengths</h2>
            <label class="block text-xs font-medium text-slate-500 mt-2">Points</label>
            <div class="space-y-2">
                @foreach($content['strengths']['points'] ?? [] as $i => $point)
                <div class="flex items-center gap-2">
                    <input type="text" wire:model.defer="content.strengths.points.{{ $i }}" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                    <button type="button" wire:click.prevent="removePoint('strengths', {{ $i }})" class="text-red-600">Remove</button>
                </div>
                @endforeach
                <button type="button" wire:click.prevent="addPoint('strengths')" class="mt-2 inline-flex items-center gap-2 rounded-md bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-500">Add Point</button>
            </div>
        </div>

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
            <button type="submit" wire:loading.attr="disabled" wire:target="save" class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1">
                <svg wire:loading wire:target="save" class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path></svg>
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


