<?php

namespace Sokeio\CMS;

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
            ->name('sokeio-cms')
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
