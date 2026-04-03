<?php

namespace App\Livewire\Public\About;

use App\Models\DynamicPages;
use Livewire\Attributes\Computed;
use Livewire\Component;

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
        $content = $this->pageContent;
        $metaTitle = data_get($content, 'meta_title')
            ?? data_get($content, 'hero.title')
            ?? setting('seo_title')
            ?? 'About Us';

        return view('livewire.public.about.about', [
            'sections' => $this->sections,
            'stats' => $this->stats,
        ])->layout('layouts.app', [
            'title' => $metaTitle,
        ])->title($metaTitle);
    }
}
