<?php

use Illuminate\Support\Facades\Route;
use Sokeio\Cms\Livewire\ShortcodeSetting;

Route::group(['as' => 'admin.'], function () {
    Route::post('/setting/shortcode', ShortcodeSetting::class)->name('shortcode-setting');
});
