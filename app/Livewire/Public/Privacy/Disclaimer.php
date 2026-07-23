<?php

namespace App\Livewire\Public\Privacy;

use App\Models\Page;
use Livewire\Component;

class Disclaimer extends Component
{
    public ?Page $page = null;

    public function mount(): void
    {
        $this->page = Page::where('slug', 'disclaimer')->first();
    }

    public function render()
    {
        return view('livewire.public.privacy.disclaimer', [
            'page' => $this->page,
        ]);
    }
}
