<?php

use Illuminate\Support\Facades\Route;
use Sokeio\Cms\Livewire\Catalog\CatalogForm;
use Sokeio\Cms\Livewire\Catalog\CatalogTable;
use Sokeio\Cms\Livewire\Page\PageForm;
use Sokeio\Cms\Livewire\Page\PageTable;
use Sokeio\Cms\Livewire\Post\PostForm;
use Sokeio\Cms\Livewire\Post\PostTable;
use Sokeio\Cms\Livewire\Tag\TagForm;
use Sokeio\Cms\Livewire\Tag\TagTable;
use Sokeio\Cms\Models\CatalogTranslation;

Route::group(['as' => 'admin.'], function () {
    route_crud('page', PageTable::class, PageForm::class);
    route_crud('catalog', CatalogTable::class, CatalogForm::class);
    route_crud('tag', TagTable::class, TagForm::class);
    route_crud('post', PostTable::class, PostForm::class);
});
