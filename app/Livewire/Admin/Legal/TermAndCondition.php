<?php

namespace App\Livewire\Admin\Legal;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TermAndCondition extends Component
{
    public ?Page $page = null;

    public string $content = '';

    public function mount(): void
    {
        $this->page = Page::firstOrCreate(
            ['slug' => 'terms-and-conditions'],
            [
                'title' => 'Terms & Conditions',
                'meta_title' => 'Terms & Conditions',
            ]
        );

        $this->content = (string) ($this->page->content ?? '');
    }

    public function save(): void
    {
        $this->validate([
            'content' => ['nullable', 'string'],
        ]);

        if ($this->page) {
            $this->page->update([
                'content' => $this->content,
            ]);
        }

        $this->dispatch('toast-show', [
            'message' => 'Terms & Conditions updated successfully.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.legal.term-and-condition', [
            'page' => $this->page,
        ]);
    }
}
