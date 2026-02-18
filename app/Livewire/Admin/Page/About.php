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
            'sections' => [],
            'stats' => [
                ['value' => '66.6k', 'label' => 'Total Services Loan'],
                ['value' => '99.6k', 'label' => 'Customer Satisfaction'],
                ['value' => '44.6k', 'label' => 'Compare Loan'],
                ['value' => '56+', 'label' => 'Awards Won'],
            ],
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
