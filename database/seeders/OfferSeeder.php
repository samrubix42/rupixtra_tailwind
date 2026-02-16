<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = [
            [
                'url' => 'https://example.com/special-discount-offer',
                'featured_image' => null,
                'is_active' => true,
            ],
            [
                'url' => 'https://example.com/limited-time-promotion',
                'featured_image' => null,
                'is_active' => true,
            ],
            [
                'url' => 'https://example.com/black-friday-deals',
                'featured_image' => null,
                'is_active' => false,
            ],
            [
                'url' => 'https://example.com/summer-sale-2024',
                'featured_image' => null,
                'is_active' => true,
            ],
            [
                'url' => 'https://example.com/new-customer-bonus',
                'featured_image' => null,
                'is_active' => false,
            ],
        ];

        foreach ($offers as $offer) {
            Offer::create($offer);
        }
    }
}