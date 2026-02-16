<?php

namespace App\Livewire\Public\Privacy;

use App\Models\Page;
use Livewire\Component;

class TermAndCondition extends Component
{
    public ?Page $page = null;

    public function mount(): void
    {
        $this->page = Page::where('slug', 'terms-and-conditions')->first();
    }

    public function render()
    {
        return view('livewire.public.privacy.term-and-condition', [
            'page' => $this->page,
        ]);
    }
}
