<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6 flex items-center justify-between gap-3">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Edit Service</h1>
            <p class="mt-1 text-sm text-slate-500">Update service content, image and structured sections.</p>
        </div>

        <a href="{{ route('admin.services') }}" class="inline-flex items-center gap-2 rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
            <i class="ri-arrow-left-line text-base"></i>
            <span>Back to list</span>
        </a>
    </div>

    <form wire:submit.prevent="save" class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left: main info + primary section + structured sections -->
        <div class="lg:col-span-2 space-y-4">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 space-y-4">
                <div>
                    <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-[11px] font-medium text-blue-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                        Section 1 · Basic Details
                    </span>
                    <h2 class="mt-2 text-base font-semibold text-slate-900">Service title & slug</h2>
                    <p class="mt-1 text-xs text-slate-500">Adjust how this service appears in admin and URLs.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Title</label>
                        <input type="text" wire:model.live="title"
                               class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                        @error('title')
                            <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Slug</label>
                        <input type="text" wire:model.defer="slug"
                               class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                        @error('slug')
                            <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 space-y-3">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-[11px] font-medium text-blue-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                            Section 2 · Primary Content
                        </span>
                        <h2 class="mt-2 text-base font-semibold text-slate-900">Primary Section</h2>
                        <p class="text-xs text-slate-400">Main description of the service shown on the detail page.</p>
                    </div>
                </div>

                <div
                    wire:ignore
                    x-data
                    x-init="
                        tinymce.init({
                            selector: '#primary-section-editor',
                            height: 350,
                            menubar: false,
                            plugins: 'advlist autolink lists link charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime table paste help wordcount',
                            toolbar: 'undo redo | formatselect | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | fullscreen',
                            branding: false,
                            setup(editor) {
                                editor.on('init change keyup undo redo', function () {
                                    $wire.set('primary_section', editor.getContent());
                                });

                                editor.on('init', function () {
                                    editor.setContent(@js($primary_section));
                                });
                            }
                        });
                    "
                >
                    <textarea id="primary-section-editor" class="rich-text-editor hidden">{!! $primary_section !!}</textarea>
                </div>
                @error('primary_section')
                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Secondary sections -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-[11px] font-medium text-blue-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                            Section 3 · Highlights
                        </span>
                        <h2 class="mt-2 text-base font-semibold text-slate-900">Secondary Sections</h2>
                        <p class="text-xs text-slate-400">Key/value highlights grouped under small headings.</p>
                    </div>
                    <button type="button" wire:click="addSecondarySection" class="inline-flex items-center gap-1 rounded-md bg-blue-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-blue-500">
                        <i class="ri-add-line text-sm"></i>
                        <span>Add Section</span>
                    </button>
                </div>

                <div class="space-y-4">
                    @forelse ($secondary_sections as $sectionIndex => $section)
                        <div class="rounded-lg border border-slate-200 bg-slate-50/40 p-4 space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <div class="flex-1">
                                    <label class="block text-xs font-medium text-slate-600">Section Title</label>
                                    <input type="text" wire:model.defer="secondary_sections.{{ $sectionIndex }}.title" class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-1.5 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                                    @error('secondary_sections.' . $sectionIndex . '.title')
                                        <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="button" wire:click="removeSecondarySection({{ $sectionIndex }})" class="inline-flex items-center px-2 py-1 text-xs font-medium text-rose-600 bg-rose-50 rounded-md hover:bg-rose-100">
                                    Remove
                                </button>
                            </div>

                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <p class="text-xs font-medium text-slate-600">Key / Value Items</p>
                                    <button type="button" wire:click="addSecondaryItem({{ $sectionIndex }})" class="inline-flex items-center gap-1 rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 hover:bg-blue-100">
                                        <i class="ri-add-line text-xs"></i>
                                        <span>Add Item</span>
                                    </button>
                                </div>

                                <div class="space-y-2">
                                    @foreach ($section['items'] as $itemIndex => $item)
                                        <div class="grid grid-cols-12 gap-2 items-center">
                                            <div class="col-span-5">
                                                <input type="text" placeholder="Key" wire:model.defer="secondary_sections.{{ $sectionIndex }}.items.{{ $itemIndex }}.key" class="block w-full rounded-md border border-slate-300 px-3 py-1.5 text-xs text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                                            </div>
                                            <div class="col-span-6">
                                                <input type="text" placeholder="Value" wire:model.defer="secondary_sections.{{ $sectionIndex }}.items.{{ $itemIndex }}.value" class="block w-full rounded-md border border-slate-300 px-3 py-1.5 text-xs text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                                            </div>
                                            <div class="col-span-1 flex justify-end">
                                                <button type="button" wire:click="removeSecondaryItem({{ $sectionIndex }}, {{ $itemIndex }})" class="inline-flex items-center px-2 py-1 text-xs font-medium text-rose-600 bg-rose-50 rounded-md hover:bg-rose-100">
                                                    &times;
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">No secondary sections yet. Click "Add Section" to create one.</p>
                    @endforelse
                </div>
            </div>

            <!-- Tertiary sections -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-[11px] font-medium text-blue-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                            Section 4 · Detail Blocks
                        </span>
                        <h2 class="mt-2 text-base font-semibold text-slate-900">Tertiary Sections</h2>
                        <p class="text-xs text-slate-400">Detailed blocks with description and key/value details.</p>
                    </div>
                    <button type="button" wire:click="addTertiarySection" class="inline-flex items-center gap-1 rounded-md bg-blue-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-blue-500">
                        <i class="ri-add-line text-sm"></i>
                        <span>Add Section</span>
                    </button>
                </div>

                <div class="space-y-4">
                    @forelse ($tertiary_sections as $sectionIndex => $section)
                        <div class="rounded-lg border border-slate-200 bg-slate-50/40 p-4 space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-medium text-slate-600">Section Title</label>
                                        <input type="text" wire:model.defer="tertiary_sections.{{ $sectionIndex }}.title" class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-1.5 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                                        @error('tertiary_sections.' . $sectionIndex . '.title')
                                            <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-slate-600">Description</label>
                                        <textarea rows="2" wire:model.defer="tertiary_sections.{{ $sectionIndex }}.description" class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-1.5 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"></textarea>
                                        @error('tertiary_sections.' . $sectionIndex . '.description')
                                            <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <button type="button" wire:click="removeTertiarySection({{ $sectionIndex }})" class="inline-flex items-center px-2 py-1 text-xs font-medium text-rose-600 bg-rose-50 rounded-md hover:bg-rose-100">
                                    Remove
                                </button>
                            </div>

                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <p class="text-xs font-medium text-slate-600">Key / Value Items</p>
                                    <button type="button" wire:click="addTertiaryItem({{ $sectionIndex }})" class="inline-flex items-center gap-1 rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 hover:bg-blue-100">
                                        <i class="ri-add-line text-xs"></i>
                                        <span>Add Item</span>
                                    </button>
                                </div>

                                <div class="space-y-2">
                                    @foreach ($section['items'] as $itemIndex => $item)
                                        <div class="grid grid-cols-12 gap-2 items-center">
                                            <div class="col-span-5">
                                                <input type="text" placeholder="Key" wire:model.defer="tertiary_sections.{{ $sectionIndex }}.items.{{ $itemIndex }}.key" class="block w-full rounded-md border border-slate-300 px-3 py-1.5 text-xs text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                                            </div>
                                            <div class="col-span-6">
                                                <input type="text" placeholder="Value" wire:model.defer="tertiary_sections.{{ $sectionIndex }}.items.{{ $itemIndex }}.value" class="block w-full rounded-md border border-slate-300 px-3 py-1.5 text-xs text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                                            </div>
                                            <div class="col-span-1 flex justify-end">
                                                <button type="button" wire:click="removeTertiaryItem({{ $sectionIndex }}, {{ $itemIndex }})" class="inline-flex items-center px-2 py-1 text-xs font-medium text-rose-600 bg-rose-50 rounded-md hover:bg-rose-100">
                                                    &times;
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">No tertiary sections yet. Click "Add Section" to create one.</p>
                    @endforelse
                </div>
            </div>

            <!-- Lenders -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-[11px] font-medium text-blue-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                            Section 5 · Lenders
                        </span>
                        <h2 class="mt-2 text-base font-semibold text-slate-900">Service Lenders</h2>
                        <p class="text-xs text-slate-400">Manage lending partners connected to this service.</p>
                    </div>
                    <button type="button" wire:click="addLender" class="inline-flex items-center gap-1 rounded-md bg-blue-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-blue-500">
                        <i class="ri-add-line text-sm"></i>
                        <span>Add Lender</span>
                    </button>
                </div>

                <div class="space-y-4">
                    @forelse ($lenders as $lenderIndex => $lender)
                        <div class="rounded-lg border border-slate-200 bg-slate-50/40 p-4 space-y-3">
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex-1 space-y-3">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div>
                                            <label class="block text-xs font-medium text-slate-600">Lender Name</label>
                                            <input type="text" placeholder="e.g. ABC Bank" wire:model.defer="lenders.{{ $lenderIndex }}.name" class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-1.5 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                                        </div>
                                        <div class="grid grid-cols-2 gap-3">
                                            <div>
                                                <label class="block text-xs font-medium text-slate-600">Age Limit</label>
                                                <input type="text" placeholder="e.g. 21-60 years" wire:model.defer="lenders.{{ $lenderIndex }}.age_limit" class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-1.5 text-xs text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                                            </div>
                                            <div>
                                                <label class="block text-xs font-medium text-slate-600">Repayment Period</label>
                                                <input type="text" placeholder="e.g. up to 60 months" wire:model.defer="lenders.{{ $lenderIndex }}.repayment_period" class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-1.5 text-xs text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none" />
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-medium text-slate-600">Short Description</label>
                                        <textarea rows="2" placeholder="Key highlights, eligibility notes or special terms..." wire:model.defer="lenders.{{ $lenderIndex }}.description" class="mt-1 block w-full rounded-md border border-slate-300 px-3 py-1.5 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"></textarea>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-medium text-slate-600">Lender Logo (optional)</label>
                                        <input
                                            type="file"
                                            wire:model="lenders.{{ $lenderIndex }}.logo"
                                            class="mt-1 block w-full text-xs text-slate-800 border border-slate-300 rounded-md cursor-pointer focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 file:mr-3 file:py-1 file:px-2 file:rounded file:border-0 file:bg-slate-100 file:text-[11px] file:text-slate-700" />
                                        @error('lenders.' . $lenderIndex . '.logo')
                                            <p class="mt-1 text-[11px] text-rose-500">{{ $message }}</p>
                                        @enderror
                                        <div class="mt-1 text-[11px] text-slate-500">PNG, JPG up to 2MB.</div>

                                        <div wire:loading wire:target="lenders.{{ $lenderIndex }}.logo" class="mt-1 text-[11px] text-slate-500">
                                            Uploading logo...
                                        </div>

                                        <div class="mt-2 space-y-2">
                                            @if (!empty($lender['logo']))
                                                <div>
                                                    <p class="text-[11px] text-slate-500 mb-1">New logo preview</p>
                                                    <img src="{{ $lender['logo']->temporaryUrl() }}" class="h-16 w-16 object-cover rounded-md border border-slate-200 bg-white" />
                                                </div>
                                            @elseif (!empty($lender['existing_logo']))
                                                <div>
                                                    <p class="text-[11px] text-slate-500 mb-1">Current logo</p>
                                                    <img src="{{ asset('storage/' . $lender['existing_logo']) }}" class="h-16 w-16 object-cover rounded-md border border-slate-200 bg-white" />
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button type="button" wire:click="removeLender({{ $lenderIndex }})" class="inline-flex items-center px-2 py-1 text-xs font-medium text-rose-600 bg-rose-50 rounded-md hover:bg-rose-100">
                                    <i class="ri-delete-bin-6-line text-sm"></i>
                                    <span>Remove</span>
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">No lenders configured yet. Click "Add Lender" to start adding partners.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Right: featured image + submit -->
        <div class="space-y-4">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 space-y-3">
                <h2 class="text-base font-semibold text-slate-900">Featured Image</h2>
                <p class="text-xs text-slate-400">Thumbnail shown on the public service page.</p>

                <div>
                    <input type="file" wire:model="featured_image" class="mt-1 block w-full text-sm text-slate-800 border border-slate-300 rounded-md cursor-pointer focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 file:mr-3 file:py-1 file:px-2 file:rounded file:border-0 file:bg-slate-100 file:text-xs file:text-slate-700" />
                    @error('featured_image')
                        <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                    @enderror
                    <div class="mt-1 text-xs text-slate-500">PNG, JPG up to 2MB.</div>

                    <div wire:loading wire:target="featured_image" class="mt-2 text-xs text-slate-500">
                        Uploading image...
                    </div>

                    <div class="mt-3 space-y-3">
                        @if ($featured_image)
                            <div>
                                <p class="text-xs text-slate-500 mb-1">New Preview</p>
                                <img src="{{ $featured_image->temporaryUrl() }}" class="h-32 w-full object-cover rounded-md border border-slate-200">
                            </div>
                        @elseif ($existing_featured_image)
                            <div>
                                <p class="text-xs text-slate-500 mb-1">Current Image</p>
                                <img src="{{ asset('storage/' . $existing_featured_image) }}" class="h-32 w-full object-cover rounded-md border border-slate-200">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex justify-end">
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1 disabled:opacity-70"
                        wire:loading.attr="disabled"
                        wire:target="save,featured_image">
                    <span
                        wire:loading
                        wire:target="save"
                        class="inline-block h-4 w-4 border-2 border-white border-t-transparent rounded-full animate-spin"></span>
                    <span wire:loading.remove wire:target="save">Update Service</span>
                    <span wire:loading wire:target="save">Updating...</span>
                </button>
            </div>
        </div>
    </form>
</div>
