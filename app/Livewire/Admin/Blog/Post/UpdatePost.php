<?php

namespace App\Livewire\Admin\Blog\Post;

use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePost extends Component
{
    use WithFileUploads;
    public ?Post $post = null;

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

    public function mount(int $postId): void
    {
        $this->post = Post::findOrFail($postId);

        $this->title = (string) $this->post->title;
        $this->category_id = $this->post->category_id;
        $this->slug = (string) $this->post->slug;
        $this->meta_title = $this->post->meta_title;
        $this->meta_description = $this->post->meta_description;
        $this->meta_keywords = $this->post->meta_keywords;
        $this->tags = $this->post->tags;
        $this->content = (string) $this->post->content;
        $this->is_published = (bool) $this->post->is_published;
    }

    protected function rules(): array
    {
        $postId = $this->post?->id ?? null;

        return [
            'title' => 'required|string|min:3',
            'category_id' => 'nullable|exists:blog_categories,id',
            'slug' => 'required|string|unique:posts,slug,' . $postId,
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
        if (! $this->slug) {
            $this->slug = Str::slug($this->title);
        }
    }

    public function save(): void
    {
        $validated = $this->validate();

        if ($this->featured_image) {
            if ($this->post->featured_image) {
                Storage::disk('public')->delete($this->post->featured_image);
            }

            $path = $this->featured_image->store('posts', 'public');
            $validated['featured_image'] = $path;
        } else {
            unset($validated['featured_image']);
        }

        $this->post->update($validated);

        $this->dispatch('toast-show', [
            'message' => 'Post updated successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->redirectRoute('admin.blog-list');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.post.update-post', [
            'categories' => BlogCategory::where('status', true)->orderBy('title')->get(),
        ]);
    }
}
