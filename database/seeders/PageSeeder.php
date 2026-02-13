<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'privacy-policy',
                'title' => 'Privacy Policy',
                'meta_title' => 'Privacy Policy',
                'meta_description' => 'Read the privacy policy outlining how we collect, use, and protect your personal information when using our services.',
                'meta_keywords' => 'privacy, data protection, terms, policy',
                'content' => <<<HTML
<h2>Introduction</h2>
<p>We are committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our website and services.</p>

<h2>Information We Collect</h2>
<ul>
    <li><strong>Personal Information:</strong> such as your name, email address, phone number, and any details you submit through forms on our site.</li>
    <li><strong>Usage Data:</strong> such as IP address, browser type, device information, pages visited, and access times.</li>
</ul>

<h2>How We Use Your Information</h2>
<ul>
    <li>To provide, operate, and maintain our services.</li>
    <li>To respond to enquiries and provide customer support.</li>
    <li>To improve the user experience and analyse how our services are used.</li>
    <li>To comply with legal obligations and protect our legal rights.</li>
</ul>

<h2>Sharing Your Information</h2>
<p>We do not sell your personal information. We may share information with trusted third parties who assist us in operating our website and services, subject to appropriate confidentiality and data protection obligations, or where required by law.</p>

<h2>Data Retention</h2>
<p>We retain your information only for as long as necessary to fulfil the purposes outlined in this Privacy Policy or as required by applicable law.</p>

<h2>Your Rights</h2>
<ul>
    <li>To access and review the personal data we hold about you.</li>
    <li>To request correction or deletion of your personal data, subject to legal requirements.</li>
    <li>To withdraw consent where processing is based on consent.</li>
</ul>

<h2>Security</h2>
<p>We implement reasonable technical and organisational measures to protect your information from unauthorised access, loss, or misuse. However, no method of transmission over the internet is completely secure.</p>

<h2>Changes to This Policy</h2>
<p>We may update this Privacy Policy from time to time. The updated version will be indicated by an updated <em>Last Updated</em> date and will be effective as soon as it is accessible.</p>

<h2>Contact Us</h2>
<p>If you have any questions about this Privacy Policy or how your data is handled, please contact us via the details provided on our website.</p>
HTML,
            ],
            [
                'slug' => 'home',
                'title' => 'Home',
                'meta_title' => 'Home',
                'meta_description' => 'Welcome to our website. Explore our services and learn how we can help you.',
                'meta_keywords' => 'home, loans, services, finance',
                'content' => null,
            ],
            [
                'slug' => 'our-story',
                'title' => 'Our Story',
                'meta_title' => 'About Us',
                'meta_description' => 'Learn more about our story, mission, and values.',
                'meta_keywords' => 'about us, our story, company, mission, values',
                'content' => null,
            ],
            [
                'slug' => 'reach-us',
                'title' => 'Reach Us',
                'meta_title' => 'Contact Us',
                'meta_description' => 'Get in touch with us for any questions or support.',
                'meta_keywords' => 'contact, reach us, support, help',
                'content' => null,
            ],
            [
                'slug' => 'calculator',
                'title' => 'Calculator',
                'meta_title' => 'Loan Calculator',
                'meta_description' => 'Use our calculator to estimate your loan repayments and plan better.',
                'meta_keywords' => 'calculator, loan calculator, emi, repayments',
                'content' => null,
            ],
            [
                'slug' => 'blog',
                'title' => 'Blog',
                'meta_title' => 'Blog',
                'meta_description' => 'Read our latest articles and updates.',
                'meta_keywords' => 'blog, articles, news, updates',
                'content' => null,
            ],
            [
                'slug' => 'services',
                'title' => 'Services',
                'meta_title' => 'Services',
                'meta_description' => 'Discover the range of loan and financial services we offer.',
                'meta_keywords' => 'services, loans, finance, products',
                'content' => null,
            ],
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                $pageData
            );
        }
    }
}
