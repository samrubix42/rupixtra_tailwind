<?php

namespace App\Livewire\Public\Home;

use App\Models\Interest;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Home extends Component
{
    public string $interestEmail = '';

    protected array $rules = [
        'interestEmail' => ['required', 'email', 'max:255', 'unique:interests,email'],
    ];

    public function submitInterest(): void
    {
        $this->validate();

        Interest::create([
            'email' => $this->interestEmail,
        ]);

        $to = setting('contact_email') ?? config('mail.from.address');

        if ($to) {
            Mail::raw(
                'New interest submitted: ' . $this->interestEmail,
                function ($message) use ($to) {
                    $message->to($to)
                        ->subject('New Interest Submission');
                }
            );
        }

        session()->flash('interest_success', 'Thank you! We will connect with you shortly.');

        $this->reset('interestEmail');
    }

    public function render()
    {
        $testimonials = Testimonial::query()
            ->where('status', true)
            ->latest()
            ->take(20)
            ->get();

        $latestPosts = Post::query()
            ->where('is_published', true)
            ->latest()
            ->take(4)
            ->get();

        $offers = Offer::query()
            ->where('is_active', true)
            ->whereNotNull('featured_image')
            ->latest()
            ->get();

        return view('livewire.public.home.home', [
            'testimonials' => $testimonials,
            'latestPosts' => $latestPosts,
            'offers' => $offers,
        ]);
    }
}
