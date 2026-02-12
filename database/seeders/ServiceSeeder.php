<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceLender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Personal Loan Assistance',
                'primary_section' => implode("\n", [
                    '<p>We help you compare and choose the right personal loan with transparent guidance and end-to-end support.</p>',
                    '<p>Our experts work with leading banks and NBFCs so you get competitive interest rates, flexible tenures and quick approvals.</p>',
                ]),
                'secondary_sections' => [
                    [
                        'title' => 'Why choose this service',
                        'items' => [
                            ['key' => 'Fast processing', 'value' => 'Preliminary eligibility check within 24 hours'],
                            ['key' => 'Multiple lenders', 'value' => 'Compare offers from banks and NBFCs in one place'],
                        ],
                    ],
                ],
                'tertiary_sections' => [
                    [
                        'title' => 'Basic eligibility',
                        'description' => 'General guidelines that most lenders follow for personal loan applications.',
                        'items' => [
                            ['key' => 'Minimum age', 'value' => '21 years'],
                            ['key' => 'Income proof', 'value' => 'Salary slips or bank statements'],
                        ],
                    ],
                ],
                'lenders' => [
                    [
                        'name' => 'ABC Bank',
                        'age_limit' => '21-60 years',
                        'repayment_period' => 'Up to 60 months',
                        'description' => 'Popular choice for salaried customers with competitive interest rates.',
                    ],
                    [
                        'name' => 'XYZ Finance',
                        'age_limit' => '23-58 years',
                        'repayment_period' => 'Up to 48 months',
                        'description' => 'NBFC partner with flexible documentation options.',
                    ],
                ],
            ],
            [
                'title' => 'Home Loan Consulting',
                'primary_section' => implode("\n", [
                    '<p>From first-time buyers to experienced investors, we guide you through the complete home loan journey.</p>',
                    '<p>We simplify complex terms, negotiate with lenders and help you structure EMIs that fit your long-term plans.</p>',
                ]),
                'secondary_sections' => [
                    [
                        'title' => 'Key benefits',
                        'items' => [
                            ['key' => 'Doorstep assistance', 'value' => 'From document pick-up to sanction follow-ups'],
                            ['key' => 'Transparent comparison', 'value' => 'Side-by-side view of rates and charges'],
                        ],
                    ],
                ],
                'tertiary_sections' => [
                    [
                        'title' => 'What we cover',
                        'description' => 'We cover everything from eligibility analysis to post-sanction support.',
                        'items' => [
                            ['key' => 'Property type', 'value' => 'New, resale, under-construction'],
                            ['key' => 'Top-up options', 'value' => 'Guidance on balance transfer and top-up loans'],
                        ],
                    ],
                ],
                'lenders' => [
                    [
                        'name' => 'HomeFirst Bank',
                        'age_limit' => '24-65 years',
                        'repayment_period' => 'Up to 30 years',
                        'description' => 'Known for flexible home loan products and longer tenures.',
                    ],
                ],
            ],
        ];

        foreach ($services as $data) {
            $service = Service::firstOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'title' => $data['title'],
                    'primary_section' => $data['primary_section'],
                    'featured_image' => null,
                    'secondary_sections' => $data['secondary_sections'],
                    'tertiary_sections' => $data['tertiary_sections'],
                ]
            );

            if ($service->wasRecentlyCreated) {
                foreach ($data['lenders'] as $lender) {
                    ServiceLender::create([
                        'service_id' => $service->id,
                        'name' => $lender['name'],
                        'logo' => null,
                        'age_limit' => $lender['age_limit'] ?? null,
                        'repayment_period' => $lender['repayment_period'] ?? null,
                        'description' => $lender['description'] ?? null,
                    ]);
                }
            }
        }
    }
}
