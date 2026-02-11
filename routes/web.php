<?php

use App\Livewire\Admin\Blog\Category\BlogCategoryList;
use App\Livewire\Admin\Blog\Post\AddPost;
use App\Livewire\Admin\Blog\Post\PostList;
use App\Livewire\Admin\Blog\Post\UpdatePost;
use App\Livewire\Admin\Dashboard\Dashboard;
use App\Livewire\Admin\Testimonial\TestimonialList;
use App\Livewire\Admin\Setting\Setting as AdminSetting;
use App\Livewire\Auth\Login;
use App\Livewire\Page\PageMangement;
use App\Livewire\Public\About\About;
use App\Livewire\Public\Blog\Blog;
use App\Livewire\Public\Blog\BlogView;
use App\Livewire\Public\Calculator\Calulator;
use App\Livewire\Public\Contact\Contact;
use App\Livewire\Public\Home\Home;
use App\Livewire\Public\Service\ServiceView;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;


Route::livewire('/', Home::class)->name('home');
Route::livewire('/our-story', About::class)->name('our-story');
Route::livewire('/reach-us', Contact::class)->name('reach-us');
Route::livewire('calculator', Calulator::class)->name('calculator');
Route::livewire('blog',Blog::class)->name('blog');
Route::livewire('blog/{slug}',BlogView::class)->name('blog.post');
Route::livewire('services',ServiceView::class)->name('services');
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cache Cleared!";
});
Route::livewire('login', Login::class)->name('login');
Route::post('logout', function () {
    FacadesAuth::logout();

    return redirect()->route('admin.login');
})->name('logout');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::livewire('/', Dashboard::class)->name('admin.dashboard');
    Route::livewire('testimonial', TestimonialList::class)->name('admin.testimonial');
    Route::livewire('blog/category', BlogCategoryList::class)->name('admin.blog.category');
    Route::livewire('blog-list', PostList::class)->name('admin.blog-list');
    Route::livewire('blog/post/add', AddPost::class)->name('admin.blog.post.add');
    Route::livewire('blog/post/edit/{postId}', UpdatePost::class)->name('admin.blog.post.edit');
    Route::livewire('page-management',PageMangement::class)->name('admin.page-management');
    Route::livewire('settings', AdminSetting::class)->name('admin.settings');
});
