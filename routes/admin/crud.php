<?php

use Sokeio\Sokeio\Crud\CatalogCrud;
use Sokeio\Sokeio\Crud\PageCrud;
use Sokeio\Sokeio\Crud\PostCrud;
use Sokeio\Sokeio\Crud\TagCrud;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function () {
    PageCrud::RoutePage('page');
    TagCrud::RoutePage('tag');
    CatalogCrud::RoutePage('catalog');
    PostCrud::RoutePage('post');
});
