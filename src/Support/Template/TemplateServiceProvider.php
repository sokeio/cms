<?php

namespace Sokeio\CMS\Support\Template;

use Illuminate\Support\ServiceProvider;
use Sokeio\CMS\Support\Template\Loader\TemplateLoader;
use Sokeio\Platform;

class TemplateServiceProvider extends ServiceProvider
{
    public function register()
    {
        Platform::addLoader(TemplateLoader::class);
    }
}
