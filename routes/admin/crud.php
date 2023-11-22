<?php

use Sokeio\Blog\Crud\CatalogCrud;
use Sokeio\Blog\Crud\PageCrud;
use Sokeio\Blog\Crud\PostCrud;
use Sokeio\Blog\Crud\TagCrud;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function () {
    PageCrud::RoutePage('page');
    TagCrud::RoutePage('tag');
    CatalogCrud::RoutePage('catalog');
    PostCrud::RoutePage('post');
});
