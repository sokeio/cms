<?php

use Illuminate\Support\Facades\Route;

Route::name('site.')->group(function () {
    permalink_route('site_login_ permalink', 'login', \Sokeio\CmsTheme\Livewire\Auth\Login::class, 'login');
    permalink_route('site_logout_ permalink', 'logout', function () {
        auth()->logout();
        return redirect(route('site.login'));
    }, 'logout');
    permalink_route('site_sign_up_ permalink', 'sign-up', \Sokeio\CmsTheme\Livewire\Auth\Signup::class, 'sign-up');
    permalink_route('site_forgot_password_ permalink', 'forgot-password', \Sokeio\CmsTheme\Livewire\Auth\ForgotPassword::class, 'forgot-password');
});
