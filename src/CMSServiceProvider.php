<?php

namespace Sokeio\CMS;

use Illuminate\Support\ServiceProvider;
use Sokeio\CMS\Support\Shortcode\ShortcodeServiceProvider;
use Sokeio\CMS\Support\Template\TemplateServiceProvider;
use Sokeio\ServicePackage;
use Sokeio\Concerns\WithServiceProvider;

class CMSServiceProvider extends ServiceProvider
{
    use WithServiceProvider;

    public function configurePackage(ServicePackage $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         */
        $package
            ->name('sokeio-cms')
            ->hasConfigFile()
            ->routeWeb()
            ->hasViews()
            ->hasHelpers()
            ->hasAssets()
            ->hasTranslations()
            ->runsMigrations();
    }
    public function packageRegistered()
    {
        $this->app->register(ShortcodeServiceProvider::class);
        $this->app->register(TemplateServiceProvider::class);
    }

    public function packageBooted()
    {
        // packageBooted
    }
}
