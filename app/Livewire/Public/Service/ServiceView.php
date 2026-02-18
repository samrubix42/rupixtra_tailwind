<?php

namespace App\Livewire\Public\Service;

use App\Models\Contact as ContactModel;
use App\Models\Service;
use App\Mail\ServiceEnquiry;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ServiceView extends Component
{
    public Service $service;

    public string $name = '';

    public ?string $email = '';

    public ?string $phone = '';

    public ?string $message = '';

    public bool $accepted_terms = false;

    protected array $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['nullable', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'message' => ['nullable', 'string', 'max:1000'],
        'accepted_terms' => ['accepted'],
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

        $contact = ContactModel::create([
            'service_id' => $this->service->id,
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'country' => null,
            'subject' => $serviceTitle . ' [' . $serviceSlug . ']',
            'message' => $validated['message'] ?? null,
            'is_read' => false,
        ]);

        try {
            $to = config('mail.from.address') ?: env('MAIL_FROM_ADDRESS');
            $mailable = new ServiceEnquiry($contact);

            if (!empty($this->service->mailer_id)) {
                Mail::to($to)->cc($this->service->mailer_id)->send($mailable);
            } else {
                Mail::to($to)->send($mailable);
            }
        } catch (\Throwable $e) {
            \Log::error('Failed to send service enquiry email: ' . $e->getMessage());
        }

        session()->flash('success', 'Thank you! Your enquiry has been sent.');

        $this->reset(['name', 'email', 'phone', 'message', 'accepted_terms']);
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
