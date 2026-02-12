<?php

namespace App\Livewire\Public\Blog;

use App\Models\BlogCategory;
use App\Models\Post;
use Livewire\Component;

class BlogView extends Component
{
    public string $slug;

    public Post $post;

    /** @var array<int, string> */
    public array $tags = [];

    public $categories;

    public $recentPosts;

    public function mount(string $slug): void
    {
        $this->slug = $slug;

        $this->post = Post::with('category')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $this->tags = collect(explode(',', (string) $this->post->tags))
            ->map(fn ($tag) => trim($tag))
            ->filter()
            ->values()
            ->all();

        $this->categories = BlogCategory::where('status', true)
            ->orderBy('title')
            ->get();

        $this->recentPosts = Post::where('is_published', true)
            ->where('id', '!=', $this->post->id)
            ->latest()
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.public.blog.blog-view');
    }
}
