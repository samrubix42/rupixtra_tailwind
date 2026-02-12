<?php

namespace App\Livewire\Public\Service;

use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ServiceView extends Component
{
    public Service $service;

    public function mount(string $slug): void
    {
        $this->service = Service::where('slug', $slug)->firstOrFail();
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        $services = Service::orderBy('title')->get(['id', 'title', 'slug']);

        return view('livewire.public.service.service-view', [
            'service' => $this->service,
            'services' => $services,
        ]);
    }
}
