<?php

namespace App\Livewire\Admin\Blog\Post;

use Livewire\Attributes\Layout;
use Livewire\Component;

class PostList extends Component
{
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.post.post-list');
    }
}
