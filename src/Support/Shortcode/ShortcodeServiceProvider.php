<?php

namespace Sokeio\CMS\Support\Shortcode;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Sokeio\CMS\Support\Shortcode\Loader\ShortcodeLoader;
use Sokeio\CMS\Support\Shortcode\View\ShortcodeFactory;
use Sokeio\Platform;

class ShortcodeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
        Livewire::component('cms::shortcode', ShortcodeComponent::class);
    }
    /**
     * Enable the compiler.
     */
    public function enableCompiler()
    {
        // Check if the compiler is auto enabled
        $state = $this->app['config']->get('sokeio-cms.shortcodes-enabled', true);
        // Enable when needed
        if ($state && !Platform::isUrlAdmin()) {
            $this->app['shortcode']->enable();
        }
    }

    public function register()
    {
        Platform::addLoader(ShortcodeLoader::class);
        $this->app->singleton('shortcode', function () {
            return new ShortcodeManager();
        });
        $this->registerView();
        Platform::booted(function () {
            $this->enableCompiler();
        });
    }
    /**
     * Register Laravel view.
     */
    public function registerView()
    {
        $finder = $this->app['view']->getFinder();

        $this->app->singleton('view', function ($app) use ($finder) {
            // Next we need to grab the engine resolver instance that will be used by the
            // environment. The resolver will be used by an environment to get each of
            // the various engine implementations such as plain PHP or Blade engine.
            $resolver = $app['view.engine.resolver'];
            $env = new ShortcodeFactory($resolver, $finder, $app['events'], $app['shortcode']);

            // We will also set the container instance on this view environment since the
            // view composers may be classes registered in the container, which allows
            // for great testable, flexible composers for the application developer.
            $env->setContainer($app);
            $env->share('app', $app);

            return $env;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'shortcode',
            'view'
        ];
    }
}
