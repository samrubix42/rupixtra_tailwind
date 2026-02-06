<?php

namespace App\Livewire\Admin\Blog\Category;

use Livewire\Attributes\Layout;
use Livewire\Component;

class BlogCategoryList extends Component
{
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.category.blog-category-list');
    }
}
