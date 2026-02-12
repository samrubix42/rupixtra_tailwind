<?php

namespace App\Livewire\Public\Blog;

use App\Models\Post;
use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        $posts = Post::query()
            ->where('is_published', true)
            ->latest()
            ->get();

        return view('livewire.public.blog.blog', [
            'posts' => $posts,
        ]);
    }
}
