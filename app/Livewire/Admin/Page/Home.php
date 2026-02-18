<?php

namespace App\Livewire\Admin\Page;

use App\Models\DynamicPages;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Home extends Component
{
    use WithFileUploads;

    public array $content = [];

    public $heroImage = null;

    public function mount(): void
    {
        $page = DynamicPages::firstOrCreate(
            ['slug' => 'home'],
            ['title' => 'Home']
        );

        $this->content = $page->content ?? [
            'hero' => [
                'para' => '',
                'heading1' => '',
                'heading2' => '',
                'subtitle1' => '',
                'subtitle2' => '',
                'image' => '',
            ],
            'services' => [
                'title' => '',
                'subtitle' => '',
            ],
            'email' => [
                'title' => '',
                'subtitle' => '',
            ],
        ];
    }

    public function save(): void
    {
        $this->validate([
            'heroImage' => ['nullable', 'image', 'max:2048'],
        ]);

        $page = DynamicPages::firstOrCreate(
            ['slug' => 'home'],
            ['title' => 'Home']
        );

        if ($this->heroImage) {
            $path = $this->heroImage->store('hero-banners', 'public');
            $this->content['hero']['image'] = Storage::url($path);
        }

        $page->update([
            'content' => $this->content,
        ]);

        $this->heroImage = null;

        $this->dispatch('toast-show', [
            'message' => 'Home page content updated successfully.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }
#[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.page.home');
    }
}
