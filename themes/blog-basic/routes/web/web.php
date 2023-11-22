<?php

use Illuminate\Support\Facades\Route;
use \Sokeio\BlogTheme\Livewire\About;
use Sokeio\BlogTheme\Livewire\Alert;
use Sokeio\BlogTheme\Livewire\Button;
use Sokeio\BlogTheme\Livewire\Card;
use Sokeio\BlogTheme\Livewire\Carousel;
use Sokeio\BlogTheme\Livewire\Contact;
use Sokeio\BlogTheme\Livewire\Form;
use Sokeio\BlogTheme\Livewire\HomeFeatured;
use Sokeio\BlogTheme\Livewire\HomeFourcolumn;
use Sokeio\BlogTheme\Livewire\HomeFullWidth;
use Sokeio\BlogTheme\Livewire\HomeOnecolumn;
use Sokeio\BlogTheme\Livewire\HomeThreecolumn;
use Sokeio\BlogTheme\Livewire\HomeTwocolumn;
use Sokeio\BlogTheme\Livewire\Icon;
use Sokeio\BlogTheme\Livewire\Modal;
use Sokeio\BlogTheme\Livewire\Offcanvas;
use Sokeio\BlogTheme\Livewire\Pagination;
use Sokeio\BlogTheme\Livewire\PostCategory;
use Sokeio\BlogTheme\Livewire\PostDetail;
use Sokeio\BlogTheme\Livewire\PostVideo;
use Sokeio\BlogTheme\Livewire\Table;
use Sokeio\BlogTheme\Livewire\Typography;

Route::get('/about', route_theme(About::class))->name('about');
Route::get('/contact', route_theme(Contact::class))->name('contact');

Route::prefix('components')->as('components.')->group(function() {
    Route::get('alert', route_theme(Alert::class))->name('alert');
    Route::get('button', route_theme(Button::class))->name('button');
    Route::get('card', route_theme(Card::class))->name('card');
    Route::get('carousel', route_theme(Carousel::class))->name('carousel');
    Route::get('form', route_theme(Form::class))->name('form');
    Route::get('icon', route_theme(Icon::class))->name('icon');
    Route::get('modal', route_theme(Modal::class))->name('modal');
    Route::get('offcanvas', route_theme(Offcanvas::class))->name('offcanvas');
    Route::get('pagination', route_theme(Pagination::class))->name('pagination');
    Route::get('table', route_theme(Table::class))->name('table');
    Route::get('typography', route_theme(Typography::class))->name('typography');
});

Route::get('/component-modal', route_theme(Contact::class))->name('modals');
Route::get('/home-fullwidth', route_theme(HomeFullWidth::class))->name('home-fullwidth');
Route::get('/home-featured', route_theme(HomeFeatured::class))->name('home-featured');
Route::get('/home-fourcolumm', route_theme(HomeFourcolumn::class))->name('home-fourcolumn');
Route::get('/home-threecolumn', route_theme(HomeThreecolumn::class))->name('home-threecolumn');
Route::get('/home-twocolumn', route_theme(HomeTwocolumn::class))->name('home-twocolumn');
Route::get('/home-onecolumn', route_theme(HomeOnecolumn::class))->name('home-onecolumn');
Route::get('/post-video', route_theme(PostVideo::class))->name('post-video');
Route::get('/post-category', route_theme(PostCategory::class))->name('post-category');
Route::get('/post/{post}', route_theme(PostDetail::class))->name('post-detail');
