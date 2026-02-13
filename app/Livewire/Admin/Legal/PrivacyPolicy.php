<?php

namespace App\Livewire\Admin\Legal;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PrivacyPolicy extends Component
{
    public ?Page $page = null;

    public string $content = '';

    public function mount(): void
    {
        $this->page = Page::firstOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'title' => 'Privacy Policy',
                'meta_title' => 'Privacy Policy',
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
            'message' => 'Privacy policy updated successfully.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.legal.privacy-policy', [
            'page' => $this->page,
        ]);
    }
}
