<?php

namespace App\Livewire\Admin\Service;

use App\Models\Offer;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class OfferManagement extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Url]
    public string $search = '';

    public int $perPage = 10;

    /** @var array<int,int> */
    public array $perPageOptions = [10, 25, 50];

    public ?int $offerId = null;

    public ?string $url = null;

    public bool $is_active = true;

    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|null */
    public $featured_image = null;

    public ?string $existing_featured_image = null;

    public ?int $deleteId = null;

    protected function rules(): array
    {
        return [
            'url' => ['required', 'url', 'max:255'],
            'featured_image' => ['nullable', 'image', 'max:2048'],
            'is_active' => ['boolean'],
        ];
    }

    public function resetForm(): void
    {
        $this->reset(['offerId', 'url', 'featured_image', 'existing_featured_image']);
        $this->is_active = true;
    }

    /* -------------------------
        Modal handlers
    --------------------------*/

    public function openCreateModal(): void
    {
        $this->resetForm();
        $this->dispatch('open-modal');
    }

    public function openEditModal(int $id): void
    {
        $offer = Offer::findOrFail($id);

        $this->offerId = $offer->id;
        $this->url = $offer->url;
        $this->is_active = $offer->is_active;
        $this->existing_featured_image = $offer->featured_image;

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->dispatch('close-modal');
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->dispatch('open-delete-modal');
    }

    public function deleteConfirmed(): void
    {
        if ($this->deleteId === null) {
            return;
        }

        $offer = Offer::findOrFail($this->deleteId);

        if ($offer->featured_image) {
            Storage::disk('public')->delete($offer->featured_image);
        }

        $offer->delete();

        $this->reset('deleteId');

        $this->dispatch('toast-show', [
            'message' => 'Offer deleted successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->dispatch('close-delete-modal');
    }

    /* -------------------------
        CRUD
    --------------------------*/

    public function save(): void
    {
        $validated = $this->validate();

        $imagePath = $this->existing_featured_image;

        if (! empty($validated['featured_image'])) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $validated['featured_image']->store('offers', 'public');
        }

        Offer::updateOrCreate(
            ['id' => $this->offerId],
            [
                'url' => $validated['url'],
                'featured_image' => $imagePath,
                'is_active' => $this->is_active,
            ]
        );

        $this->dispatch('toast-show', [
            'message' => 'Offer saved successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->closeModal();
        $this->resetForm();
    }

    public function toggleStatus(int $id): void
    {
        $offer = Offer::findOrFail($id);
        $offer->update(['is_active' => !$offer->is_active]);

        $status = $offer->is_active ? 'activated' : 'deactivated';

        $this->dispatch('toast-show', [
            'message' => "Offer {$status} successfully!",
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        $offers = Offer::query()
            ->when($this->search !== '', function ($query) {
                $query->where('url', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.service.offer-management', [
            'offers' => $offers,
        ]);
    }
}
