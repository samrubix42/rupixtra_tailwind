<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Contact;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public function toast()
    {
        $this->dispatch('toast-show', [
            'message' => 'New Request',
            'type' => 'info',
            'position' => 'bottom-right',
            'html' => "
        <div class='p-4'>
            <p class='text-sm font-semibold'>New Friend Request</p>
            <p class='text-xs text-gray-500'>John Doe sent you a request</p>
        </div>
    ",
        ]);
    }
    #[Layout('layouts.admin')]
    public function render()
    {
        $stats = [
            'total_users' => User::count(),
            'total_pages' => Page::count(),
            'total_posts' => Post::count(),
            'published_posts' => Post::where('is_published', true)->count(),
            'draft_posts' => Post::where('is_published', false)->count(),
            'total_services' => Service::count(),
            'total_testimonials' => Testimonial::count(),
            'total_contacts' => Contact::count(),
            'unread_contacts' => Contact::where('is_read', false)->count(),
        ];

        $recentContacts = Contact::query()
            ->latest()
            ->take(5)
            ->get();

        $recentPosts = Post::query()
            ->where('is_published', true)
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.admin.dashboard.dashboard', [
            'stats' => $stats,
            'recentContacts' => $recentContacts,
            'recentPosts' => $recentPosts,
        ]);
    }
}
