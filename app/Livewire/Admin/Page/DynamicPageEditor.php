<?php

namespace App\Livewire\Admin\Page;

use App\Models\DynamicPages;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class DynamicPageEditor extends Component
{
    use WithFileUploads;

    public string $slug;
    public array $content = [];
    public $heroImage = null;
    public string $title = '';

    public function mount($slug): void
    {
        $this->slug = $slug;
        $page = DynamicPages::firstOrCreate(
            ['slug' => $slug],
            ['title' => ucfirst($slug)]
        );
        $this->title = $page->title;
        $this->content = $page->content ?? [];
    }

    public function save(): void
    {
        $this->validate([
            'heroImage' => ['nullable', 'image', 'max:2048'],
        ]);
        $page = DynamicPages::firstOrCreate(
            ['slug' => $this->slug],
            ['title' => $this->title]
        );
        if ($this->heroImage) {
            $path = $this->heroImage->store('hero-banners', 'public');
            if (isset($this->content['hero'])) {
                $this->content['hero']['image'] = Storage::url($path);
            }
        }
        $page->update([
            'content' => $this->content,
        ]);
        $this->heroImage = null;
        $this->dispatch('toast-show', [
            'message' => 'Page content updated successfully.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.page.dynamic-page-editor');
    }
}
