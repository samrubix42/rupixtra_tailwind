<?php

namespace App\Livewire\Public\Contact;

use App\Models\Contact as ContactModel;
use Livewire\Component;

class Contact extends Component
{
    public string $name = '';

    public ?string $email = '';

    public ?string $phone = '';

    public ?string $country = '';

    public ?string $message = '';

    protected array $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['nullable', 'email', 'max:255'],
        'phone' => ['nullable', 'string', 'max:50'],
        'country' => ['nullable', 'string', 'max:255'],
        'message' => ['nullable', 'string', 'max:1000'],
    ];

    public function submit(): void
    {
        $validated = $this->validate();

        ContactModel::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'country' => $validated['country'] ?? null,
            'message' => $validated['message'] ?? null,
            'is_read' => false,
        ]);

        session()->flash('success', 'Thank you! Your message has been sent.');

        $this->reset(['name', 'email', 'phone', 'country', 'message']);
    }

    public function render()
    {
        return view('livewire.public.contact.contact');
    }
}
