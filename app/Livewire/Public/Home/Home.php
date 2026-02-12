<?php

namespace App\Livewire\Public\Home;

use App\Models\Post;
use App\Models\Testimonial;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $testimonials = Testimonial::query()
            ->where('status', true)
            ->latest()
            ->take(20)
            ->get();

        $latestPosts = Post::query()
            ->where('is_published', true)
            ->latest()
            ->take(4)
            ->get();

        return view('livewire.public.home.home', [
            'testimonials' => $testimonials,
            'latestPosts' => $latestPosts,
        ]);
    }
}
