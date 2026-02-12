<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samples = [
            [
                'client_name' => 'A. M. Bose',
                'client_profession' => 'Business Owner',
                'client_description' => 'Working with this team made my loan process simple and stress-free. They explained every option clearly and helped me choose the best one for my business.',
                'rating' => 5,
            ],
            [
                'client_name' => 'Neha Sharma',
                'client_profession' => 'IT Professional',
                'client_description' => 'I was able to compare multiple offers in one place and got my personal loan approved much faster than I expected.',
                'rating' => 4,
            ],
            [
                'client_name' => 'Rahul Verma',
                'client_profession' => 'Self Employed',
                'client_description' => 'They helped me understand the documentation and guided me at every step. I highly recommend their services.',
                'rating' => 5,
            ],
            [
                'client_name' => 'Priya Singh',
                'client_profession' => 'Teacher',
                'client_description' => 'Transparent advice and quick responses. I felt confident about the decision I was making about my home loan.',
                'rating' => 4,
            ],
        ];

        foreach ($samples as $data) {
            Testimonial::firstOrCreate(
                [
                    'client_name' => $data['client_name'],
                    'client_profession' => $data['client_profession'],
                ],
                [
                    'client_description' => $data['client_description'],
                    'rating' => $data['rating'],
                    'status' => true,
                ]
            );
        }
    }
}
