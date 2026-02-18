<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Service;

class SearchServices extends Component
{
    public $query = '';
    public $results = [];

    public function updatedQuery()
    {
        $q = trim($this->query);
        if ($q === '') {
            $this->results = [];
            return;
        }

        $this->results = Service::where('title', 'like', "%{$q}%")
            ->orWhere('slug', 'like', "%{$q}%")
            ->orWhere('primary_section', 'like', "%{$q}%")
            ->limit(8)
            ->get();
    }

    public function render()
    {
        return view('livewire.public.search-services');
    }
}
