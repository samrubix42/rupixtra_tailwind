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

        // Create rich sample posts for key financial topics
        $samples = [
            [
                'title' => 'What is a Personal Loan? A Simple Guide',
                'meta_description' => 'Understand what a personal loan is, how it works, and when it makes sense to use one.',
                'tags' => 'Personal Loan, Unsecured Loan, Finance Basics',
                'content' => implode("\n", [
                    '<p>A personal loan is an unsecured loan offered by banks and NBFCs that can be used for multiple purposes such as medical expenses, travel, education, weddings, or debt consolidation. Unlike secured loans, it does not require you to pledge any collateral like property or gold.</p>',
                    '<p>Once approved, the loan amount is credited directly to your bank account, and you repay it through fixed EMIs over a pre-agreed tenure. The EMI consists of both principal and interest, and remains the same throughout the tenure in most cases.</p>',
                    '<p>Because personal loans are unsecured, lenders look closely at your income, employment stability, credit score, and existing obligations before approving. A strong profile usually means faster approval and better terms.</p>',
                    '<p>Used wisely, a personal loan can help you manage short-term financial needs without disturbing your long-term investments or savings. However, it is important to borrow only what you can comfortably repay.</p>',
                ]),
            ],
            [
                'title' => 'How Personal Loan Interest Rates Work',
                'meta_description' => 'Learn how interest rates are decided on personal loans and what affects your final EMI.',
                'tags' => 'Interest Rate, Personal Loan, EMI',
                'content' => implode("\n", [
                    '<p>Interest rate is the cost you pay to the lender for borrowing money. In personal loans, rates are usually fixed, meaning your EMI stays the same throughout the tenure. Even a small difference in rate can significantly impact your total interest outgo.</p>',
                    '<p>Lenders decide your rate based on multiple factors such as your credit score, income level, employer profile, city of residence, and existing liabilities. Customers with high and stable income, clean repayment history, and strong credit scores are often offered lower rates.</p>',
                    '<p>Before accepting any loan offer, compare interest rates from different banks and NBFCs, but also look at processing fees, foreclosure charges, and other hidden costs. Sometimes a slightly higher rate with lower fees may work out cheaper overall.</p>',
                    '<p>You can reduce your interest burden by choosing a suitable tenure, making part-prepayments when possible, and avoiding unnecessary borrowing. Always calculate the EMI and total payable amount before you sign.</p>',
                ]),
            ],
            [
                'title' => 'Personal Loan Eligibility: Who Can Apply?',
                'meta_description' => 'Check the key eligibility criteria for getting a personal loan approved smoothly.',
                'tags' => 'Eligibility, Personal Loan, Income Criteria',
                'content' => implode("\n", [
                    '<p>Every lender has its own eligibility criteria, but most look at a few common aspects: age, income, employment type, credit score, and existing EMIs. Typically, salaried applicants need to be between 21 and 60 years with a stable income from a reputed employer.</p>',
                    '<p>Self-employed professionals and business owners may have a different set of norms, where lenders assess business stability, turnover, and vintage through bank statements and financials. A longer and consistent track record improves your chances.</p>',
                    '<p>Your fixed obligations, such as existing EMIs and credit card dues, are compared with your income to calculate the FOIR (Fixed Obligation to Income Ratio). A lower FOIR generally indicates better repayment capacity.</p>',
                    '<p>Meeting the minimum criteria does not guarantee approval, but it ensures your application is seriously considered. To strengthen your profile, maintain a good credit score, avoid frequent job changes, and keep your EMIs within a comfortable share of your income.</p>',
                ]),
            ],
            [
                'title' => 'Documents Required for a Personal Loan',
                'meta_description' => 'Know the common documents required for personal loan approval and faster processing.',
                'tags' => 'Documents, KYC, Personal Loan',
                'content' => implode("\n", [
                    '<p>Having the right documents ready can speed up your personal loan approval significantly. Lenders typically ask for identity proof, address proof, income proof, and bank statements to verify your profile.</p>',
                    '<p>Identity and address proofs may include Aadhaar card, PAN card, passport, voter ID, driving licence, or utility bills. Make sure your KYC documents are updated and consistent across records.</p>',
                    '<p>For salaried individuals, income proof generally consists of salary slips for the last few months, Form 16, and bank statements showing salary credits. Self-employed applicants may need IT returns, GST returns, audited financials, and current account statements.</p>',
                    '<p>Submitting clear, valid, and recent documents reduces back-and-forth with the lender and helps you receive a decision faster. Digital KYC and e-signing have further simplified the process with many modern lenders.</p>',
                ]),
            ],
            [
                'title' => 'CIBIL Score Improvement: Practical Steps That Work',
                'meta_description' => 'Actionable ways to improve your CIBIL score and become more loan-eligible.',
                'tags' => 'CIBIL, Credit Score, Loan Approval',
                'content' => implode("\n", [
                    '<p>Your CIBIL score is one of the first things lenders check before approving a loan or credit card. A higher score signals responsible behaviour and can get you better offers with lower interest rates.</p>',
                    '<p>Start by paying all your EMIs and credit card bills on or before their due date. Even one missed or delayed payment can negatively impact your score and stay on record for years.</p>',
                    '<p>Try to keep your credit utilisation under 30–40% of your total card limit. Consistently maxing out your limit makes you appear credit-hungry and risky in the eyes of lenders.</p>',
                    '<p>Review your credit report at regular intervals to spot incorrect entries, duplicate loans, or closed accounts that are still shown as active. Raise disputes promptly so that such errors are rectified and your score reflects your true behaviour.</p>',
                ]),
            ],
            [
                'title' => 'Smart Loan Tips to Borrow Better',
                'meta_description' => 'Practical loan tips to help you borrow smartly and avoid common mistakes.',
                'tags' => 'Loan Tips, Borrow Smart, EMIs',
                'content' => implode("\n", [
                    '<p>Before taking any loan, define your purpose clearly and calculate how much you genuinely need. Borrowing extra just because you are eligible can increase your EMI burden without adding real value.</p>',
                    '<p>Always compare offers across lenders instead of accepting the first approval you receive. Look beyond the EMI amount and check interest rate, fees, lock-in period, and foreclosure rules.</p>',
                    '<p>Avoid juggling too many loans and credit cards at the same time. Multiple unsecured loans can make your finances complex and push your FOIR beyond a healthy level.</p>',
                    '<p>Where possible, make occasional part-prepayments to reduce your principal and interest outgo. Even small additional payments, when made consistently, can shorten your tenure and save you money.</p>',
                ]),
            ],
            [
                'title' => 'Investment Basics for Beginners',
                'meta_description' => 'A beginner-friendly guide to understanding the basics of investing your money.',
                'tags' => 'Investment Basics, Mutual Funds, Savings',
                'content' => implode("\n", [
                    '<p>Investing is about putting your money to work so it can grow over time. Before you start, build an emergency fund that covers at least three to six months of essential expenses. This creates a safety cushion for unexpected events.</p>',
                    '<p>Next, define your financial goals—short term, medium term, and long term. Goals could include buying a car, funding education, creating a retirement corpus, or starting a business. Your goals determine which investment products are suitable for you.</p>',
                    '<p>Begin with simple and regulated products like mutual funds, fixed deposits, and recurring deposits. Diversify across asset classes instead of putting everything into a single option. Systematic Investment Plans (SIPs) in mutual funds can help you invest regularly with discipline.</p>',
                    '<p>Most importantly, invest according to your risk appetite. Do not chase quick returns or follow unverified tips. A steady, well-planned approach usually works better than trying to time the market.</p>',
                ]),
            ],
            [
                'title' => 'Why Insurance Awareness Matters',
                'meta_description' => 'Understand the importance of insurance and how it protects your finances.',
                'tags' => 'Insurance, Health Insurance, Term Plan',
                'content' => implode("\n", [
                    '<p>Insurance is a financial safety net that protects you and your family from unexpected events such as illness, accidents, or loss of income. Without proper insurance, a single emergency can disrupt years of savings.</p>',
                    '<p>Life insurance, especially pure term plans, ensures your family is financially protected if something happens to you. Health insurance helps you manage rising medical costs without dipping into long-term investments.</p>',
                    '<p>It is important to read policy features carefully—sum insured, exclusions, waiting periods, and claim processes—before buying. Choosing the cheapest premium without understanding coverage can lead to unpleasant surprises at the time of claim.</p>',
                    '<p>Review your insurance coverage regularly as your income, lifestyle, and responsibilities grow. Adequate insurance is a key pillar of a strong financial plan.</p>',
                ]),
            ],
            [
                'title' => 'Build and Improve Your CIBIL Score Over Time',
                'meta_description' => 'Long-term strategies to build, maintain, and continuously improve a strong CIBIL score.',
                'tags' => 'CIBIL, Credit History, Financial Discipline',
                'content' => implode("\n", [
                    '<p>Building a strong CIBIL score is not an overnight process—it is the result of consistent and responsible financial behaviour over time. Start by using credit carefully and only when it adds real value, not for impulse purchases.</p>',
                    '<p>Maintain a healthy mix of credit, such as a combination of secured loans and limited unsecured credit, instead of relying only on multiple personal loans and credit cards. This shows lenders that you can handle different types of credit responsibly.</p>',
                    '<p>Keep your oldest credit accounts active wherever possible, as a longer and clean credit history has a positive impact on your score. Avoid frequent closures and new applications within a short span.</p>',
                    '<p>Finally, track your CIBIL report at least once a year. Timely corrections, disciplined repayments, and thoughtful borrowing decisions together help you build and sustain an excellent credit profile.</p>',
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
