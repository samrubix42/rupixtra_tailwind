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

    #[Url]
    public string $sort = 'newest';

    public array $sortOptions = [
        'newest' => 'Newest first',
        'oldest' => 'Oldest first',
        'name_asc' => 'Name A-Z',
        'name_desc' => 'Name Z-A',
        'lenders_desc' => 'Lenders (most first)',
        'lenders_asc' => 'Lenders (least first)',
    ];

    #[Url]
    public string $lendersFilter = 'all';

    public array $lendersFilterOptions = [
        'all' => 'All lenders',
        'with' => 'With lenders',
        'without' => 'Without lenders',
    ];

    public ?int $deleteId = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

	public function updatingPerPage(): void
	{
		$this->resetPage();
	}

    public function updatingSort(): void
    {
        $this->resetPage();
    }

    public function updatingLendersFilter(): void
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
        $servicesQuery = Service::query()
            ->withCount('lenders')
            ->when($this->search !== '', function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                        ->orWhere('slug', 'like', "%{$this->search}%");
                });
            });

        if ($this->lendersFilter === 'with') {
            $servicesQuery->has('lenders');
        } elseif ($this->lendersFilter === 'without') {
            $servicesQuery->doesntHave('lenders');
        }

        switch ($this->sort) {
            case 'oldest':
                $servicesQuery->oldest();
                break;
            case 'name_asc':
                $servicesQuery->orderBy('title', 'asc');
                break;
            case 'name_desc':
                $servicesQuery->orderBy('title', 'desc');
                break;
            case 'lenders_desc':
                $servicesQuery->orderBy('lenders_count', 'desc');
                break;
            case 'lenders_asc':
                $servicesQuery->orderBy('lenders_count', 'asc');
                break;
            case 'newest':
            default:
                $servicesQuery->latest();
                break;
        }

        $services = $servicesQuery->paginate($this->perPage);

        return view('livewire.admin.service.service-list', [
            'services' => $services,
        ]);
    }
}
