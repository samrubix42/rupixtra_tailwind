<?php

namespace App\Livewire\Public\Service;

use App\Models\Contact as ContactModel;
use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ServiceView extends Component
{
    public Service $service;

    public string $name = '';

    public ?string $email = '';

    public ?string $phone = '';

    public ?string $message = '';

    protected array $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['nullable', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'message' => ['nullable', 'string', 'max:1000'],
    ];

    public function mount(string $slug): void
    {
        $this->service = Service::where('slug', $slug)->firstOrFail();
    }

    public function submit(): void
    {
        $validated = $this->validate();

        $serviceSlug = $this->service->slug;
        $serviceTitle = $this->service->title;

        ContactModel::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'country' => null,
            'subject' => $serviceTitle . ' [' . $serviceSlug . ']',
            'message' => $validated['message'] ?? null,
            'is_read' => false,
        ]);

        session()->flash('success', 'Thank you! Your enquiry has been sent.');

        $this->reset(['name', 'email', 'phone', 'message']);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $services = Service::orderBy('title')->get(['id', 'title', 'slug']);

        return view('livewire.public.service.service-view', [
            'service' => $this->service,
            'services' => $services,
        ]);
    }
}
