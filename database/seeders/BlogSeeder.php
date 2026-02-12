<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some categories
        $categories = collect([
            'Personal Loan',
            'Home Loan',
            'Car Loan',
            'Financial Planning',
        ])->map(function (string $title) {
            return BlogCategory::firstOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'title' => $title,
                    'description' => $title . ' related articles',
                    'status' => true,
                ]
            );
        });

        // Create sample posts
        $samples = [
            [
                'title' => 'Top 10 Tips for Getting a Personal Loan',
                'meta_description' => 'Practical tips to help you get a personal loan approved quickly and at better terms.',
                'tags' => 'Loan, Personal Loan, Tips, NBFC',
                'content' => implode("\n", [
                    '<p>Getting a personal loan can be simple when you prepare in advance. Start by clearly defining why you need the funds and how much you actually require. This helps you avoid over-borrowing and keeps your monthly EMIs comfortable.</p>',
                    '<p>Next, compare offers from banks, NBFCs, and online lenders. Look at interest rates, processing fees, foreclosure charges, and repayment flexibility. A slightly lower interest rate can save a lot of money over the full tenure.</p>',
                    '<p>Before you apply, check your credit score and correct any issues like late payments or incorrect records. A strong score usually means faster approval and better loan terms.</p>',
                    '<p>Finally, keep your documents ready—ID proof, address proof, income proof, and bank statements. A clean application with complete details reduces delays and improves your chances of instant approval.</p>',
                ]),
            ],
            [
                'title' => 'Smart Financial Planning Guide',
                'meta_description' => 'Learn how to plan your finances smartly for long-term stability and growth.',
                'tags' => 'Finance, Planning, Investment',
                'content' => implode("\n", [
                    '<p>Smart financial planning starts with understanding your current situation. Track your income, fixed expenses, and lifestyle spending for at least one month to see where your money actually goes.</p>',
                    '<p>Create a simple budget that reserves a portion of your income for essentials, goals, and emergencies. Even a small but consistent savings habit can make a big difference over a few years.</p>',
                    '<p>Build an emergency fund that covers at least three to six months of basic expenses. This acts as a safety net during job changes, medical situations, or unexpected repairs.</p>',
                    '<p>Once your basics are in place, start investing based on your risk profile and time horizon. Diversify across instruments like mutual funds, fixed deposits, and retirement products to balance growth and stability.</p>',
                ]),
            ],
            [
                'title' => 'How to Improve Credit Score Quickly',
                'meta_description' => 'Actionable steps to improve your credit score and increase loan approval chances.',
                'tags' => 'Credit Score, Loan, EMI',
                'content' => implode("\n", [
                    '<p>Your credit score reflects how reliably you handle borrowed money. To improve it quickly, begin by paying all your EMIs and credit card bills on or before the due date every month.</p>',
                    '<p>Avoid using your full credit limit. Try to keep your credit card utilisation below 30–40% of the total limit. High utilisation for long periods can reduce your score.</p>',
                    '<p>If you have multiple small loans or outstanding balances, consider consolidating them into a single structured loan with a clear repayment plan. This can simplify your finances and reduce the risk of missed payments.</p>',
                    '<p>Regularly review your credit report to spot any incorrect entries or outdated information. Raise disputes promptly so that errors are corrected and your score reflects your true history.</p>',
                ]),
            ],
        ];

        foreach ($samples as $index => $data) {
            $category = $categories[$index % $categories->count()];

            Post::firstOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'title' => $data['title'],
                    'category_id' => $category->id,
                    'meta_title' => $data['title'],
                    'meta_description' => $data['meta_description'],
                    'meta_keywords' => null,
                    'tags' => $data['tags'],
                    'featured_image' => null,
                    'content' => $data['content'],
                    'is_published' => true,
                ]
            );
        }
    }
}
