<?php

use Illuminate\Support\Facades\Route;
use Sokeio\Cms\Livewire\ShortcodeSetting;

Route::group(['as' => 'admin.'], function () {
    Route::get('/settings/menu', \Sokeio\Cms\Livewire\Menu\Menu::class)->name('menu');
    Route::post('/setting/shortcode', ShortcodeSetting::class)->name('shortcode-setting');
});
