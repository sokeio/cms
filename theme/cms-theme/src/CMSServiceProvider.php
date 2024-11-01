<?php

namespace Sokeio\Theme\CMS;

use Illuminate\Support\ServiceProvider;
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
            ->name('cms-theme')
            ->hasConfigFile()
            ->hasViews()
            ->hasHelpers()
            ->hasAssets()
            ->hasTranslations()
            ->runsMigrations();
    }
    public function packageRegistered()
    {
        // packageRegistered
    }
    
    public function packageBooted()
    {
        // packageBooted
    }
}
