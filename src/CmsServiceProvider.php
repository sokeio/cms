<?php

namespace Sokeio\Cms;

use Illuminate\Support\ServiceProvider;
use Sokeio\Cms\Shortcode\ShortcodesServiceProvider;
use Sokeio\Admin\Facades\Menu;
use Sokeio\Admin\Menu\MenuBuilder;
use Sokeio\Laravel\ServicePackage;
use Sokeio\Concerns\WithServiceProvider;
use Sokeio\Facades\Platform;

class CmsServiceProvider extends ServiceProvider
{
    use WithServiceProvider;

    public function configurePackage(ServicePackage $package): void
    {
        add_filter(SOKEIO_URL_ADMIN, function ($prev) {
            return $prev ? $prev : "admincp";
        });
        $this->app->register(ShortcodesServiceProvider::class);
        /*
         * This class is a Package Service Provider
         *
         */
        $package
            ->name('cms')
            ->hasConfigFile()
            ->hasViews()
            ->hasHelpers()
            ->hasAssets()
            ->hasTranslations()
            ->runsMigrations();
    }
    public function extending()
    {
    }
    public function packageRegistered()
    {
        $this->extending();
    }
    private function bootGate()
    {
        if (!$this->app->runningInConsole()) {
            add_filter(PLATFORM_PERMISSION_CUSTOME, function ($prev) {
                return [
                    ...$prev
                ];
            });
        }
    }
    public function packageBooted()
    {
        $this->bootGate();

        Platform::Ready(function () {
            if (sokeio_is_admin()) {
                Menu::Register(function () {
                    Menu::route(['name' => 'admin.page', 'params' => []], 'Pages', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-pagekit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12.077 20h-5.077v-16h11v14h-5.077"></path>
             </svg>', [], 'admin.page');
                    menu::subMenu('Posts', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                <path d="M9 9l1 0"></path>
                <path d="M9 13l6 0"></path>
                <path d="M9 17l6 0"></path>
             </svg>', function (MenuBuilder $menu) {
                        $menu->setTargetId('cms_post_menu');
                        // $menu->route(['name' => 'admin.post-list', 'params' => []], 'Posts', '', [], 'admin.post-list');
                        // $menu->route(['name' => 'admin.catalog-list', 'params' => []], 'Catalogs', '', [], 'admin.catalog-list');
                        // $menu->route(['name' => 'admin.tag-list', 'params' => []], 'Tags', '', [], 'admin.tag-list');
                    });
                    Menu::attachMenu('system_appearance_menu', function (MenuBuilder $menu) {
                        $menu->route(['name' => 'admin.menu', 'params' => []], 'Menus', '', [], 'admin.menu');
                    });
                });
            }
        });
    }
}
