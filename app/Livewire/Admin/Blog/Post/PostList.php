<?php

namespace App\Livewire\Admin\Blog\Post;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public int $perPage = 10;

    public array $perPageOptions = [10, 25, 50];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatedPerPage(): void
    {
        if (! in_array($this->perPage, $this->perPageOptions, true)) {
            $this->perPage = 10;
        }

        $this->resetPage();
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        $posts = Post::query()
            ->with('category')
            ->when($this->search !== '', function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                        ->orWhere('slug', 'like', "%{$this->search}%")
                        ->orWhere('meta_title', 'like', "%{$this->search}%");
                });
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.blog.post.post-list', [
            'posts' => $posts,
        ]);
    }
}
