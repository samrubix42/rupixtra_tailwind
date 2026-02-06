<?php

namespace App\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class TestimonialList extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public ?int $testimonialId = null;

    public string $client_name = '';
    public string $client_profession = '';
    public string $client_description = '';
    public ?int $rating = null;
    public bool $status = true;
    public ?int $deleteId = null;

    protected function rules(): array
    {
        return [
            'client_name' => 'required|string|min:2',
            'client_profession' => 'nullable|string|max:255',
            'client_description' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'status' => 'boolean',
        ];
    }


    /* -------------------------
        Modal handlers
    --------------------------*/

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed(): void
    {
        Testimonial::findOrFail($this->deleteId)->delete();

        $this->reset('deleteId');

        $this->dispatch('toast-show', [
            'message' => 'Testimonial deleted successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->dispatch('close-delete-modal');
    }

    public function openCreateModal(): void
    {
        $this->resetForm();
        $this->dispatch('open-modal');
    }

    public function openEditModal(int $id): void
    {
        $testimonial = Testimonial::findOrFail($id);

        $this->testimonialId = $testimonial->id;
        $this->client_name = (string) $testimonial->client_name;
        $this->client_profession = (string) $testimonial->client_profession;
        $this->client_description = (string) $testimonial->client_description;
        $this->rating = $testimonial->rating;
        $this->status = (bool) $testimonial->status;
    }

    public function closeModal(): void
    {
        $this->dispatch('close-modal');
    }

    /* -------------------------
        CRUD
    --------------------------*/

    public function save(): void
    {
        $this->validate();

        Testimonial::updateOrCreate(
            ['id' => $this->testimonialId],
            [
                'client_name' => $this->client_name,
                'client_profession' => $this->client_profession,
                'client_description' => $this->client_description,
                'rating' => $this->rating,
                'status' => $this->status,
            ]
        );

        $this->dispatch('toast-show', [
            'message' => 'Testimonial saved successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->closeModal();
        $this->resetForm();
    }

    public function delete(int $id): void
    {
        Testimonial::findOrFail($id)->delete();
    }

    public function resetForm(): void
    {
        $this->reset([
            'testimonialId',
            'client_name',
            'client_profession',
            'client_description',
            'rating',
            'status',
        ]);

        $this->status = true;
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.testimonial.testimonial-list', [
            'testimonials' => Testimonial::query()
                ->when($this->search !== '', function ($query) {
                    $query->where(function ($q) {
                        $q->where('client_name', 'like', "%{$this->search}%")
                            ->orWhere('client_profession', 'like', "%{$this->search}%");
                    });
                })
                ->latest()
                ->paginate(10),
        ]);
    }
}
