<?php

use Illuminate\Support\Facades\Route;
use \Sokeio\CmsTheme\Livewire\About;

Route::get('/about', route_theme(About::class))->name('about');
