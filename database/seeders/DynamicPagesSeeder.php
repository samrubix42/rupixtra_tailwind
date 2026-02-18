<?php

namespace Database\Seeders;

use App\Models\DynamicPages;
use Illuminate\Database\Seeder;

class DynamicPagesSeeder extends Seeder
{
    public function run(): void
    {
        DynamicPages::updateOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Home',
                'content' => [
                    'hero' => [
                        'para' => '',
                        'heading1' => '',
                        'heading2' => '',
                        'subtitle1' => '',
                        'subtitle2' => '',
                        'subparagraph' => '',
                        'image' => '',
                    ],
                    'services' => [
                        'title' => '',
                        'subtitle' => '',
                    ],
                    'email' => [
                        'title' => '',
                        'subtitle' => '',
                    ],
                ],
            ]
        );

        DynamicPages::updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'About',
                'content' => [
                    'sections' => [],
                    'stats' => [
                        ['value' => '66.6k', 'label' => 'Total Services Loan'],
                        ['value' => '99.6k', 'label' => 'Customer Satisfaction'],
                        ['value' => '44.6k', 'label' => 'Compare Loan'],
                        ['value' => '56+', 'label' => 'Awards Won'],
                    ],
                ],
            ]
        );
    }
}
