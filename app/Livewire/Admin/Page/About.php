<?php

namespace App\Livewire\Admin\Page;

use App\Models\DynamicPages;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class About extends Component
{
    use WithFileUploads;

    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|null */
    public $heroImage = null;

    public bool $saving = false;
    public array $content = [];

    protected $listeners = [
        'heroUpdated',
    ];

    public function mount(): void
    {
        $page = DynamicPages::firstOrCreate(
            ['slug' => 'about'],
            ['title' => 'About']
        );
        $this->content = $page->content ?? [
            'hero' => [
                'title' => 'About Us',
                'body' => '', // tinyMCE content
                'image' => '', // image URL
            ],
            'ethos' => [
                'title' => 'Our Ethos',
                'paragraph' => '',
                'points' => [],
            ],
            'mission' => [
                'title' => 'Our Mission',
                'paragraph' => '',
                'points' => [],
            ],
            'vision' => [
                'paragraph' => '',
                'points' => [],
            ],
            'strengths' => [
                'points' => [],
            ],
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
        $this->saving = true;
        $this->validate([
            'heroImage' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($this->heroImage) {
            $path = $this->heroImage->store('pages', 'public');
            $this->content['hero']['image'] = Storage::url($path);
            $this->heroImage = null;
        }
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
        $this->saving = false;
    }

    public function addPoint(string $section): void
    {
        switch ($section) {
            case 'ethos':
                $this->content['ethos']['points'][] = '';
                break;
            case 'mission':
                $this->content['mission']['points'][] = '';
                break;
            case 'vision':
                $this->content['vision']['points'][] = '';
                break;
            case 'strengths':
                $this->content['strengths']['points'][] = '';
                break;
        }
    }

    public function removePoint(string $section, int $index): void
    {
        switch ($section) {
            case 'ethos':
                if (isset($this->content['ethos']['points'][$index])) {
                    array_splice($this->content['ethos']['points'], $index, 1);
                }
                break;
            case 'mission':
                if (isset($this->content['mission']['points'][$index])) {
                    array_splice($this->content['mission']['points'], $index, 1);
                }
                break;
            case 'vision':
                if (isset($this->content['vision']['points'][$index])) {
                    array_splice($this->content['vision']['points'], $index, 1);
                }
                break;
            case 'strengths':
                if (isset($this->content['strengths']['points'][$index])) {
                    array_splice($this->content['strengths']['points'], $index, 1);
                }
                break;
        }
    }

    public function heroUpdated($html)
    {
        $this->content['hero']['body'] = $html;
    }
    #[Layout('layouts.admin')]

    public function render()
    {
        return view('livewire.admin.page.about');
    }
}
