<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Interest;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ConnectMailList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'tailwind';

    #[Url]
    public string $search = '';

    public ?int $deleteId = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed(): void
    {
        if ($this->deleteId) {
            Interest::whereKey($this->deleteId)->delete();
        }

        $this->reset('deleteId');

        $this->dispatch('toast-show', [
            'message' => 'Connect mail deleted successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function cancelDelete(): void
    {
        $this->reset('deleteId');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        $connectMails = Interest::query()
            ->when($this->search !== '', function ($query) {
                $query->where('email', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.contact.connect-mail-list', [
            'connectMails' => $connectMails,
        ]);
    }
}
