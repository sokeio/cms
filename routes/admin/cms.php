<?php

use Illuminate\Support\Facades\Route;
use Sokeio\Cms\Livewire\Page\PageForm;
use Sokeio\Cms\Livewire\Page\PageTable;

Route::group(['as' => 'admin.'], function () {
    route_crud('page', PageTable::class, PageForm::class);
});
