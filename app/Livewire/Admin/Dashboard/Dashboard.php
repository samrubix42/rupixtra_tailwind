<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public function toast(){
     $this->dispatch('toast-show', [
    'message' => 'New Request',
    'type' => 'info',
    'position' => 'bottom-right',
    'html' => "
        <div class='p-4'>
            <p class='text-sm font-semibold'>New Friend Request</p>
            <p class='text-xs text-gray-500'>John Doe sent you a request</p>
        </div>
    ",
]);

    }
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.dashboard.dashboard');
    }
}
