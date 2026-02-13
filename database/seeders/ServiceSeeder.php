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
                'title' => 'Personal Loan',
                'slug' => 'personal-loan',
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
                        'effective_interest_rate' => '10.99% p.a.',
                        'repayment_period' => 'Up to 60 months',
                        'description' => 'Popular choice for salaried customers with competitive interest rates.',
                    ],
                    [
                        'name' => 'XYZ Finance',
                        'age_limit' => '23-58 years',
                        'effective_interest_rate' => '12.49% p.a.',
                        'repayment_period' => 'Up to 48 months',
                        'description' => 'NBFC partner with flexible documentation options.',
                    ],
                ],
            ],
            [
                'title' => 'Business Loan',
                'slug' => 'business-loan',
                'primary_section' => implode("\n", [
                    '<p>Get structured business loan support for working capital, expansion, equipment purchases and more.</p>',
                    '<p>We help you prepare your financials, choose the right product and present a strong application to banks and NBFCs.</p>',
                ]),
                'secondary_sections' => [
                    [
                        'title' => 'How we add value',
                        'items' => [
                            ['key' => 'Customized structures', 'value' => 'Working capital, term loans, overdrafts and more'],
                            ['key' => 'Stronger proposals', 'value' => 'Guidance on documentation and financial projections'],
                        ],
                    ],
                ],
                'tertiary_sections' => [
                    [
                        'title' => 'Who is this for',
                        'description' => 'Designed for MSMEs, startups and self-employed professionals looking to grow.',
                        'items' => [
                            ['key' => 'Business vintage', 'value' => 'Typically 1–3 years or more, depending on lender'],
                            ['key' => 'Financial track record', 'value' => 'Basic ITRs, GST returns and bank statements'],
                        ],
                    ],
                ],
                'lenders' => [
                    [
                        'name' => 'Growth Bank',
                        'age_limit' => null,
                        'effective_interest_rate' => '11.75% p.a.',
                        'repayment_period' => 'Up to 84 months',
                        'description' => 'Offers a range of secured and unsecured business funding products.',
                    ],
                    [
                        'name' => 'Capital NBFC',
                        'age_limit' => null,
                        'effective_interest_rate' => '13.25% p.a.',
                        'repayment_period' => 'Up to 60 months',
                        'description' => 'Flexible lending partner for small and mid-sized businesses.',
                    ],
                ],
            ],
            [
                'title' => 'Home Loan',
                'slug' => 'home-loan',
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
                        'effective_interest_rate' => '8.75% p.a.',
                        'repayment_period' => 'Up to 30 years',
                        'description' => 'Known for flexible home loan products and longer tenures.',
                    ],
                ],
            ],
            [
                'title' => 'LAP',
                'slug' => 'lap',
                'primary_section' => implode("\n", [
                    '<p>Unlock the value of your residential or commercial property with a loan against property.</p>',
                    '<p>We help you understand how much you can borrow, compare offers and choose comfortable EMIs.</p>',
                ]),
                'secondary_sections' => [
                    [
                        'title' => 'Key highlights',
                        'items' => [
                            ['key' => 'High loan amounts', 'value' => 'Based on property value and income profile'],
                            ['key' => 'Flexible usage', 'value' => 'Business expansion, education, consolidation and more'],
                        ],
                    ],
                ],
                'tertiary_sections' => [
                    [
                        'title' => 'Important points',
                        'description' => 'What to keep in mind before opting for a LAP product.',
                        'items' => [
                            ['key' => 'Property documents', 'value' => 'Clear title and updated approvals required'],
                            ['key' => 'LTV ratio', 'value' => 'Loan amount is a percentage of property market value'],
                        ],
                    ],
                ],
                'lenders' => [
                    [
                        'name' => 'Secure Homes Finance',
                        'age_limit' => '25-65 years',
                        'effective_interest_rate' => '9.50% p.a.',
                        'repayment_period' => 'Up to 15 years',
                        'description' => 'Specialized in mortgage-backed funding with structured repayment options.',
                    ],
                ],
            ],
            [
                'title' => 'Credit Card',
                'slug' => 'credit-card',
                'primary_section' => implode("\n", [
                    '<p>We help you shortlist and apply for credit cards that match your lifestyle and spending patterns.</p>',
                    '<p>From rewards and cashback to travel and premium benefits, we guide you to the right card mix.</p>',
                ]),
                'secondary_sections' => [
                    [
                        'title' => 'Benefits of our guidance',
                        'items' => [
                            ['key' => 'Right card fit', 'value' => 'Match cards with your actual monthly spends'],
                            ['key' => 'Fee awareness', 'value' => 'Clarity on joining fees, annual charges and add-ons'],
                        ],
                    ],
                ],
                'tertiary_sections' => [
                    [
                        'title' => 'Usage best practices',
                        'description' => 'Simple habits that can keep your credit profile healthy.',
                        'items' => [
                            ['key' => 'On-time payments', 'value' => 'Always pay at least the total due before due date'],
                            ['key' => 'Utilization ratio', 'value' => 'Try to keep usage under 30–40% of your limit'],
                        ],
                    ],
                ],
                'lenders' => [
                    [
                        'name' => 'Metro Bank Cards',
                        'age_limit' => '21-60 years',
                        'effective_interest_rate' => '3.25% per month',
                        'repayment_period' => null,
                        'description' => 'Wide range of cards across cashback, travel and lifestyle categories.',
                    ],
                    [
                        'name' => 'Skyline Bank',
                        'age_limit' => '23-65 years',
                        'effective_interest_rate' => '3.40% per month',
                        'repayment_period' => null,
                        'description' => 'Premium card offerings with airport lounge and travel benefits.',
                    ],
                ],
            ],
        ];

        foreach ($services as $data) {
            $slug = $data['slug'] ?? Str::slug($data['title']);

            $service = Service::firstOrCreate(
                ['slug' => $slug],
                [
                    'title' => $data['title'],
                    'slug' => $slug,
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
                        'effective_interest_rate' => $lender['effective_interest_rate'] ?? null,
                        'repayment_period' => $lender['repayment_period'] ?? null,
                        'description' => $lender['description'] ?? null,
                    ]);
                }
            }
        }
    }
}
