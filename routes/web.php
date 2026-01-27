<?php

use App\Livewire\Public\About\About;
use App\Livewire\Public\Contact\Contact;
use App\Livewire\Public\Home\Home;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::livewire('/',Home::class)->name('home');
Route::livewire('/our-story',About::class)->name('our-story');
Route::livewire('/reach-us',Contact::class)->name('reach-us');
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cache Cleared!";
});
