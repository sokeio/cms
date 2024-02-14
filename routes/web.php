<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Sokeio\Cms\Livewire\CatalogView;
use Sokeio\Cms\Livewire\PageView;
use Sokeio\Cms\Livewire\PostView;
use Sokeio\Cms\Livewire\TagView;

app()->booted(function () {
    Route::group([], function () {
        Route::get('/p/{post}', PostView::class)->name('post.slug');
        Route::get('/c/{catalog}', CatalogView::class)->name('catalog.slug');
        Route::get('/t/{tag}', TagView::class)->name('tag.slug');
        Route::get('/{page}', PageView::class)->name('page.slug');
    });
});
