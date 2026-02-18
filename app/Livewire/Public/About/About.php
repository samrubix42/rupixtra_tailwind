<?php

namespace App\Livewire\Public\About;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\DynamicPages;

class About extends Component
{
    #[Computed]
    public function getPageContentProperty(): array
    {
        $page = DynamicPages::where('slug', 'about')->first();
        return $page?->content ?? [];
    }

    #[Computed]
    public function getSectionsProperty(): array
    {
        return data_get($this->pageContent, 'sections', []);
    }

    #[Computed]
    public function getStatsProperty(): array
    {
        return data_get($this->pageContent, 'stats', []);
    }

    public function render()
    {
        return view('livewire.public.about.about', [
            'sections' => $this->sections,
            'stats' => $this->stats,
        ]);
    }
}
