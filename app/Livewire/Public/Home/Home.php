<?php

namespace App\Livewire\Public\Home;

use App\Models\Interest;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\DynamicPages;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Computed;
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

    #[Computed]
    public function getPageContentProperty(): array
    {
        $page = DynamicPages::where('slug', 'home')->first();
        return $page?->content ?? [];
    }

    #[Computed]
    public function getHeroProperty()
    {
        return data_get($this->pageContent, 'hero', []);
    }

    #[Computed]
    public function getServicesProperty()
    {
        return data_get($this->pageContent, 'services', []);
    }

    #[Computed]
    public function getEmailProperty()
    {
        return data_get($this->pageContent, 'email', []);
    }

    public function render()
    {
        return view('livewire.public.home.home', [
            'testimonials' => $this->testimonials,
            'latestPosts' => $this->latestPosts,
            'offers' => $this->offers,
            'hero' => $this->hero,
            'services' => $this->services,
            'email' => $this->email,
        ]);
    }

    #[Computed]
    public function getTestimonialsProperty()
    {
        return Testimonial::query()
            ->where('status', true)
            ->latest()
            ->take(20)
            ->get();
    }

    #[Computed]
    public function getLatestPostsProperty()
    {
        return Post::query()
            ->where('is_published', true)
            ->latest()
            ->take(4)
            ->get();
    }

    #[Computed]
    public function getOffersProperty()
    {
        return Offer::query()
            ->where('is_active', true)
            ->whereNotNull('featured_image')
            ->latest()
            ->get();
    }
}
