<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Contact;
use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ContactList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'tailwind';

    #[Url]
    public string $search = '';

    public string $date = '';

    public string $serviceIdSearch = '';

    public ?int $serviceId = null;

    public ?int $viewId = null;
    public ?int $deleteId = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatedDate(): void
    {
        $this->resetPage();
    }

    public function updatingServiceIdSearch(): void
    {
        $this->resetPage();
    }

    public function updatingServiceId(): void
    {
        $this->resetPage();
    }

    public function clearDate(): void
    {
        $this->date = '';
        $this->resetPage();
    }

    public function markAsRead(int $id): void
    {
        Contact::whereKey($id)->update(['is_read' => true]);

        $this->dispatch('toast-show', [
            'message' => 'Contact marked as read.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function markAsUnread(int $id): void
    {
        Contact::whereKey($id)->update(['is_read' => false]);

        $this->dispatch('toast-show', [
            'message' => 'Contact marked as unread.',
            'type' => 'info',
            'position' => 'top-right',
        ]);
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed(): void
    {
        if ($this->deleteId) {
            Contact::whereKey($this->deleteId)->delete();
        }

        $this->reset('deleteId');

        $this->dispatch('toast-show', [
            'message' => 'Contact deleted successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function cancelDelete(): void
    {
        $this->reset('deleteId');
    }

    public function viewMessage(int $id): void
    {
        $this->viewId = $id;
        Contact::whereKey($id)->update(['is_read' => true]);
    }

    public function closeView(): void
    {
        $this->reset('viewId');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        $contactsQuery = Contact::query()
            ->with('service')
            ->when($this->search !== '', function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%")
                        ->orWhere('phone', 'like', "%{$this->search}%")
                        ->orWhere('country', 'like', "%{$this->search}%");
                });
            })
            ->when($this->date !== '', function ($query) {
                $query->whereDate('created_at', $this->date);
            })
            ->when($this->serviceIdSearch !== '', function ($query) {
                $query->where('service_id', $this->serviceIdSearch);
            })
            ->when($this->serviceId !== null, function ($query) {
                $query->where('service_id', $this->serviceId);
            });

        $contacts = $contactsQuery
            ->latest()
            ->paginate(10);

        $selectedContact = $this->viewId
            ? Contact::find($this->viewId)
            : null;

        $services = Service::orderBy('title')->get(['id', 'title']);

        return view('livewire.admin.contact.contact-list', [
            'contacts' => $contacts,
            'selectedContact' => $selectedContact,
            'services' => $services,
        ]);
    }
}
