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
        $menu = collect([

            (object)[
                'title' => 'Dashboard',
                'icon' => 'ri-dashboard-line',
                'url' => route('admin.dashboard'),
                'hasSubmenu' => false,
                'submenu' => [],
            ],
                 (object)[
                'title' => 'Blog',
                'icon' => 'ri-article-line',
                'url' => 'javascript:void(0)',
                'hasSubmenu' => true,
                'submenu' => [
                  
                    (object)[
                        'title'=> 'Blog Categories',
                        'icon' => 'ri-list-check',
                        'url' => route('admin.blog.category'),
                        'hasSubmenu' => false,
                        'submenu' => [],
                    ],
                    (object)[
                        'title' => 'Blog List',
                        'icon' => 'ri-file-list-3-line',
                        'url' => route('admin.blog-list'),
                        'hasSubmenu' => false,
                        'submenu' => [],
                    ],
                ],
            ],
        ]);

        return $menu;
    }
}
