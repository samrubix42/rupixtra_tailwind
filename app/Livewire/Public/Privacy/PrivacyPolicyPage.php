<?php

namespace App\Livewire\Public\Privacy;

use App\Models\Page;
use Livewire\Component;

class PrivacyPolicyPage extends Component
{
    public ?Page $page = null;

    public function mount(): void
    {
        $this->page = Page::where('slug', 'privacy-policy')->first();
    }

    public function render()
    {
        return view('livewire.public.privacy.privacy-policy-page', [
            'page' => $this->page,
        ]);
    }
}
