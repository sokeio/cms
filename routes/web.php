<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Sokeio\Cms\Livewire\CatalogView;
use Sokeio\Cms\Livewire\PageView;
use Sokeio\Cms\Livewire\PostView;
use Sokeio\Cms\Livewire\TagView;
use Sokeio\Facades\Platform;

permalink_route('cms_post_permalink', 'post/{post}', PostView::class, 'post.slug');
permalink_route('cms_catalog_permalink', 'catalog/{catalog}', CatalogView::class, 'catalog.slug');
permalink_route('cms_tag_permalink', 'tag/{tag}', TagView::class, 'tag.slug');
Platform::RouteSiteBeforeReady(function () {
    permalink_route('cms_page_permalink', '{page}', PageView::class, 'page.slug');
});
