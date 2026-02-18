<?php

namespace App\Livewire\Admin\Page;

use App\Models\DynamicPages;
use Livewire\Attributes\Layout;
use Livewire\Component;

class About extends Component
{
    public array $content = [];

    public function mount(): void
    {
        $page = DynamicPages::firstOrCreate(
            ['slug' => 'about'],
            ['title' => 'About']
        );

        $this->content = $page->content ?? [
            'hero' => [
                'heading' => '',
                'subtitle' => '',
                'paragraph' => '',
            ],
            'sections' => [],
        ];
    }

    public function save(): void
    {
        $page = DynamicPages::firstOrCreate(
            ['slug' => 'about'],
            ['title' => 'About']
        );

        $page->update([
            'content' => $this->content,
        ]);

        $this->dispatch('toast-show', [
            'message' => 'About page content updated successfully.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }
    #[Layout('layouts.admin')]

    public function render()
    {
        return view('livewire.admin.page.about');
    }
}
