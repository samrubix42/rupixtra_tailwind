<?php

namespace App\Livewire\Public\Contact;

use App\Mail\ContactEnquiry;
use App\Models\Contact as ContactModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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

        $contact = ContactModel::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'country' => $validated['country'] ?? null,
            'subject' => 'Contact Enquiry',
            'message' => $validated['message'] ?? null,
            'is_read' => false,
        ]);

        try {
            Mail::to('info@rupixtra.com')->send(new ContactEnquiry($contact));
        } catch (\Throwable $e) {
            Log::error('Failed to send contact enquiry email: ' . $e->getMessage());
        }

        session()->flash('success', 'Thank you! Your message has been sent.');

        $this->reset(['name', 'email', 'phone', 'country', 'message']);
    }

    public function render()
    {
        return view('livewire.public.contact.contact');
    }
}
