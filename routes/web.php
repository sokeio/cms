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

use Illuminate\Support\Facades\Route;
use Sokeio\CMS\Shortcode;
use Sokeio\CMS\Template;

Route::get('/templates', function () {
    return Template::getTemplates();
});

Route::get('/shortcodes', function () {
    return Shortcode::all();
});
