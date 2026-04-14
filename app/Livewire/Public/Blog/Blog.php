<?php

namespace App\Livewire\Public\Blog;

use App\Models\BlogCategory;
use App\Models\Post;
use Livewire\Attributes\Url;
use Livewire\Component;

class Blog extends Component
{
    #[Url(as: 'category')]
    public ?string $categorySlug = null;

    #[Url(as: 'tag')]
    public ?string $tag = null;

    public function updatedCategorySlug(): void
    {
        $this->categorySlug = $this->sanitizeValue($this->categorySlug);
    }

    public function updatedTag(): void
    {
        $this->tag = $this->sanitizeValue($this->tag);
    }

    private function sanitizeValue(?string $value): ?string
    {
        $clean = trim((string) $value);

        return $clean === '' ? null : $clean;
    }

    public function render()
    {
        $this->categorySlug = $this->sanitizeValue($this->categorySlug);
        $this->tag = $this->sanitizeValue($this->tag);

        $posts = Post::query()
            ->with('category')
            ->where('is_published', true)
            ->when($this->categorySlug, function ($query) {
                $query->whereHas('category', function ($categoryQuery) {
                    $categoryQuery->where('slug', $this->categorySlug);
                });
            })
            ->when($this->tag, function ($query) {
                $query->whereRaw("FIND_IN_SET(?, REPLACE(tags, ' ', '')) > 0", [$this->tag]);
            })
            ->latest()
            ->get();

        $categories = BlogCategory::query()
            ->where('status', true)
            ->orderBy('title')
            ->get(['id', 'title', 'slug']);

        $allTags = Post::query()
            ->where('is_published', true)
            ->whereNotNull('tags')
            ->pluck('tags')
            ->flatMap(fn ($tagList) => explode(',', (string) $tagList))
            ->map(fn ($tag) => trim($tag))
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->all();

        return view('livewire.public.blog.blog', [
            'posts' => $posts,
            'categories' => $categories,
            'allTags' => $allTags,
        ]);
    }
}
