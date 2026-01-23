<?php

use App\Livewire\Public\Home\Home;
use Illuminate\Support\Facades\Route;


Route::livewire('/',Home::class)->name('home');
