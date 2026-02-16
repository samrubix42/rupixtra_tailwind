<div
    x-data="{ open: false }"
    x-on:open-delete-modal.window="open = true"
    x-on:close-delete-modal.window="open = false"
    x-cloak
>
    <!-- Backdrop -->
    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 bg-black/40 z-40"
    ></div>

    <!-- Modal -->
    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center px-4"
    >
        <div class="w-full max-w-md rounded-xl bg-white shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800">
                    Delete Offer
                </h2>
                <button
                    @click="open = false"
                    class="text-gray-400 hover:text-gray-600 transition-colors"
                >
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>

            <!-- Body -->
            <div class="px-6 py-6 text-sm text-gray-700">
                <div class="flex items-center gap-3 mb-3">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-rose-100 flex items-center justify-center">
                        <i class="ri-error-warning-line text-rose-600 text-lg"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">
                            Delete this offer?
                        </p>
                        <p class="text-sm text-gray-600 mt-1">
                            This action cannot be undone.
                        </p>
                    </div>
                </div>
                <p class="text-xs text-rose-600 bg-rose-50 p-2 rounded">
                    <i class="ri-information-line mr-1"></i>
                    The featured image will also be permanently deleted from storage.
                </p>
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 px-6 py-4 bg-gray-50">
                <button
                    @click="open = false"
                    class="rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 transition-colors"
                >
                    Cancel
                </button>

                <button
                    wire:click="deleteConfirmed"
                    wire:loading.attr="disabled"
                    wire:target="deleteConfirmed"
                    class="rounded-lg bg-rose-600 px-4 py-2 text-sm font-medium text-white hover:bg-rose-500 transition-colors
                           disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-1"
                >
                    <span wire:loading.remove wire:target="deleteConfirmed">
                        <i class="ri-delete-bin-6-line mr-1"></i>
                        Yes, Delete
                    </span>
                    <span wire:loading wire:target="deleteConfirmed" class="flex items-center gap-1">
                        <i class="ri-loader-4-line animate-spin"></i>
                        Deleting...
                    </span>
                </button>
            </div>

        </div>
    </div>
</div>