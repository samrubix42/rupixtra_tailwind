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
                'featured_image' => 'offers/offer1.jpg', // You can add actual image files to storage/app/public/offers/
                'is_active' => true,
            ],
            [
                'url' => 'https://example.com/limited-time-promotion',
                'featured_image' => 'offers/offer2.jpg',
                'is_active' => true,
            ],
            [
                'url' => 'https://example.com/summer-sale-2024',
                'featured_image' => 'offers/offer3.jpg',
                'is_active' => true,
            ],
            [
                'url' => 'https://example.com/new-customer-bonus',
                'featured_image' => 'offers/offer4.jpg',
                'is_active' => true,
            ],
            [
                'url' => 'https://example.com/holiday-special',
                'featured_image' => 'offers/offer5.jpg',
                'is_active' => true,
            ],
        ];

        foreach ($offers as $offer) {
            Offer::create($offer);
        }
    }
}