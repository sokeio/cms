<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function () {
    Route::get('/settings/menu', \Sokeio\Sokeio\Livewire\Pages\Menu\Menu::class)->name('menu');
});
