<?php

use App\Livewire\Public\Home\Home;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::livewire('/',Home::class)->name('home');


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cache Cleared!";
});
