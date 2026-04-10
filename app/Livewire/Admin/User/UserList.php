<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'tailwind';

    #[Url]
    public string $search = '';

    public ?int $userId = null;
    public ?int $deleteId = null;

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $changePassword = true;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    protected function rules(): array
    {
        $passwordRule = $this->changePassword || $this->userId === null
            ? 'required|min:8|confirmed'
            : 'nullable|min:8|confirmed';

        return [
            'name' => 'required|string|min:2|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->userId),
            ],
            'password' => $passwordRule,
        ];
    }

    public function openCreateModal(): void
    {
        $this->resetForm();
        $this->dispatch('open-modal');
    }

    public function openEditModal(int $id): void
    {
        $user = User::findOrFail($id);

        $this->userId = $user->id;
        $this->name = (string) $user->name;
        $this->email = (string) $user->email;
        $this->password = '';
        $this->password_confirmation = '';
        $this->changePassword = false;
    }

    public function closeModal(): void
    {
        $this->dispatch('close-modal');
    }

    public function enablePasswordChange(): void
    {
        $this->changePassword = true;
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function disablePasswordChange(): void
    {
        if ($this->userId !== null) {
            $this->changePassword = false;
            $this->password = '';
            $this->password_confirmation = '';
        }
    }

    public function save(): void
    {
        $validated = $this->validate();

        $payload = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        if ($this->changePassword || $this->userId === null) {
            $payload['password'] = $validated['password'];
        }

        User::updateOrCreate(
            ['id' => $this->userId],
            $payload
        );

        $this->dispatch('toast-show', [
            'message' => $this->userId ? 'User updated successfully!' : 'User created successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->closeModal();
        $this->resetForm();
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed(): void
    {
        if ($this->deleteId) {
            User::whereKey($this->deleteId)->delete();
        }

        $this->reset('deleteId');

        $this->dispatch('toast-show', [
            'message' => 'User deleted successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->dispatch('close-delete-modal');
    }

    public function resetForm(): void
    {
        $this->reset([
            'userId',
            'name',
            'email',
            'password',
            'password_confirmation',
            'changePassword',
        ]);

        $this->changePassword = true;
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.user.user-list', [
            'users' => User::query()
                ->when($this->search !== '', function ($query) {
                    $query->where(function ($q) {
                        $q->where('name', 'like', "%{$this->search}%")
                            ->orWhere('email', 'like', "%{$this->search}%");
                    });
                })
                ->latest()
                ->paginate(10),
        ]);
    }
}
