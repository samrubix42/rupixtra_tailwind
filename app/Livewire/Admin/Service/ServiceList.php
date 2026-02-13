<?php

namespace App\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceList extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

	#[Url]
	public int $perPage = 10;

	public array $perPageOptions = [10, 25, 50];

    public ?int $deleteId = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

	public function updatingPerPage(): void
	{
		$this->resetPage();
	}

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
    }

    public function cancelDelete(): void
    {
        $this->reset('deleteId');
    }

    public function deleteConfirmed(): void
    {
        if ($this->deleteId) {
            Service::whereKey($this->deleteId)->delete();
        }

        $this->reset('deleteId');
        $this->dispatch('close-modal');

        $this->dispatch('toast-show', [
            'message' => 'Service deleted successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        $services = Service::query()
			->withCount('lenders')
            ->when($this->search !== '', function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                        ->orWhere('slug', 'like', "%{$this->search}%");
                });
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.service.service-list', [
            'services' => $services,
        ]);
    }
}
