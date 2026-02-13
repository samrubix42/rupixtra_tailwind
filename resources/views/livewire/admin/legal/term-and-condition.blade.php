<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6 flex items-center justify-between gap-3">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Terms &amp; Conditions</h1>
            <p class="mt-1 text-sm text-slate-500">Edit the terms and conditions content shown on the website.</p>
        </div>

        <button
            wire:click="save"
            wire:loading.attr="disabled"
            class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1 disabled:opacity-70">
            <span
                wire:loading
                wire:target="save"
                class="inline-block h-4 w-4 border-2 border-white border-t-transparent rounded-full animate-spin"></span>
            <span wire:loading.remove wire:target="save">Save Changes</span>
            <span wire:loading wire:target="save">Saving...</span>
        </button>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 sm:p-6 lg:p-8">
        <div class="flex items-center justify-between mb-3">
            <div>
                <h2 class="text-sm font-semibold text-slate-900">Terms Content</h2>
                <p class="text-xs text-slate-400">Full-screen TinyMCE editor with rich formatting tools.</p>
            </div>
        </div>

        <div
            wire:ignore
            x-data="{ value: @entangle('content') }"
            x-init="
                if (window.tinymce) {
                    tinymce.init({
                        target: $refs.tinymce,
                        height: window.innerHeight - 220,
                        menubar: 'file edit view insert format tools table help',
                        plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks visualchars code fullscreen',
                            'insertdatetime media table emoticons hr wordcount'
                        ],
                        toolbar:
                            'undo redo | styleselect formatselect | fontselect fontsizeselect | ' +
                            'bold italic underline strikethrough forecolor backcolor | ' +
                            'alignleft aligncenter alignright alignjustify | ' +
                            'bullist numlist outdent indent | ' +
                            'blockquote hr subscript superscript | ' +
                            'link image media emoticons | table | ' +
                            'removeformat code fullscreen',
                        toolbar_mode: 'sliding',
                        branding: false,
                        setup: function (editor) {
                            editor.on('blur', function () {
                                value = editor.getContent();
                            });

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
            "
        >
            <textarea
                x-ref="tinymce"
                class="w-full border border-slate-200 rounded-md text-sm"
            >{!! $content !!}</textarea>
        </div>
    </div>

</div>
