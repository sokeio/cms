<?php

use Sokeio\Cms\Crud\CatalogCrud;
use Sokeio\Cms\Crud\PageCrud;
use Sokeio\Cms\Crud\PostCrud;
use Sokeio\Cms\Crud\TagCrud;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function () {
    PageCrud::RoutePage('page');
    TagCrud::RoutePage('tag');
    CatalogCrud::RoutePage('catalog');
    PostCrud::RoutePage('post');
});
