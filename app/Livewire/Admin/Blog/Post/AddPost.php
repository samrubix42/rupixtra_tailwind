<?php

namespace App\Livewire\Admin\Blog\Post;

use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPost extends Component
{
    use WithFileUploads;

    public string $title = '';
    public ?int $category_id = null;
    public string $slug = '';
    public ?string $meta_title = null;
    public ?string $meta_description = null;
    public ?string $meta_keywords = null;
    public ?string $tags = null;
    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|null */
    public $featured_image = null;
    public string $content = '';
    public bool $is_published = false;

    protected function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'category_id' => 'nullable|exists:blog_categories,id',
            'slug' => 'required|string|unique:posts,slug',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'is_published' => 'boolean',
        ];
    }

    public function updatedTitle(): void
    {
   
            $this->slug = Str::slug($this->title);
        
    }

    public function save(): void
    {
        $validated = $this->validate();

        if (! empty($validated['featured_image'])) {
            $path = $validated['featured_image']->store('posts', 'public');
            $validated['featured_image'] = $path;
        } else {
            $validated['featured_image'] = null;
        }

        Post::create($validated);

        $this->dispatch('toast-show', [
            'message' => 'Post created successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->redirectRoute('admin.blog-list');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.post.add-post', [
            'categories' => BlogCategory::where('status', true)->orderBy('title')->get(),
        ]);
    }
}
