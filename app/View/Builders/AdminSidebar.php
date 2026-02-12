<?php

namespace App\View\Builders;

use Illuminate\Support\Collection;

class AdminSidebar
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public static function menu($user): self
    {
        return new self($user);
    }

    public function get(): Collection
    {
        return collect([
            (object) [
                'title' => 'Dashboard',
                'icon' => 'ri-dashboard-line',
                'url' => route('admin.dashboard'),
                'hasSubmenu' => false,
                'submenu' => [],
            ],
            (object) [
                'title' => 'Pages',
                'icon' => 'ri-file-list-3-line',
                'url' => route('admin.page-management'),
                'hasSubmenu' => false,
                'submenu' => [],
            ],
            (object) [
                'title' => 'Blog',
                'icon' => 'ri-article-line',
                'url' => 'javascript:void(0)',
                'hasSubmenu' => true,
                'submenu' => [
                    (object) [
                        'title' => 'Blog Categories',
                        'icon' => 'ri-list-check',
                        'url' => route('admin.blog.category'),
                        'hasSubmenu' => false,
                        'submenu' => [],
                    ],
                    (object) [
                        'title' => 'Blog List',
                        'icon' => 'ri-file-list-3-line',
                        'url' => route('admin.blog-list'),
                        'hasSubmenu' => false,
                        'submenu' => [],
                    ],
                ],
            ],
            (object) [
                'title' => 'Services',
                'icon' => 'ri-customer-service-2-line',
                'url' => 'javascript:void(0)',
                'hasSubmenu' => true,
                'submenu' => [
                    (object) [
                        'title' => 'Service List',
                        'icon' => 'ri-file-list-3-line',
                        'url' => route('admin.services'),
                        'hasSubmenu' => false,
                        'submenu' => [],
                    ],
                    (object) [
                        'title' => 'Add Service',
                        'icon' => 'ri-add-line',
                        'url' => route('admin.services.add'),
                        'hasSubmenu' => false,
                        'submenu' => [],
                    ],
                ],
            ],
            (object) [
                'title' => 'Testimonials',
                'icon' => 'ri-chat-quote-line',
                'url' => route('admin.testimonial'),
                'hasSubmenu' => false,
                'submenu' => [],
            ],
            (object)[
                'title' => 'Contacts',
                'icon' => 'ri-contacts-line',
                'url' => route('admin.contacts'),
                'hasSubmenu' => false,
                'submenu' => [],
            ],
            (object) [
                'title' => 'Settings',
                'icon' => 'ri-settings-3-line',
                'url' => route('admin.settings'),
                'hasSubmenu' => false,
                'submenu' => [],
            ],
        ]);
    }
}
