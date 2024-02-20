<?php

namespace Sokeio\Cms;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Sokeio\Cms\Livewire\MenuItemCategory;
use Sokeio\Cms\Livewire\MenuItemPage;
use Sokeio\Cms\Livewire\MenuItemPost;
use Sokeio\Cms\Shortcodes\ShortcodesServerProvider;
use Sokeio\Facades\Menu;
use Sokeio\Menu\MenuBuilder;
use Sokeio\Cms\Livewire\PageView;
use Sokeio\Cms\Models\Page;
use Sokeio\Cms\Shortcode\ShortcodeserviceProvider;
use Sokeio\Components\UI;
use Sokeio\Laravel\ServicePackage;
use Sokeio\Concerns\WithServiceProvider;
use Sokeio\Facades\MenuRender;
use Sokeio\Facades\Platform;

class CmsServiceProvider extends ServiceProvider
{
    use WithServiceProvider;

    public function configurePackage(ServicePackage $package): void
    {
        add_filter(SOKEIO_URL_ADMIN, function ($prev) {
            return $prev ? $prev : "admincp";
        });
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
        add_action('PLATFORM_BODY_BEFORE', function () {
            if (!sokeio_is_admin() && !setting('PLATFORM_HIDE_PANEL_CMS') && Platform::CheckConnectDB()) {
                echo Livewire::mount('cms::panel-admin');
            }
        });
        add_filter(PLATFORM_HOMEPAGE, function ($prev) {
            if ($pageId = setting('PLATFORM_HOMEPAGE')) {
                return ['uses' => PageView::class, 'params' => [
                    'page' => Page::query()->where('id', $pageId)->first()
                ]];
            }
            add_filter('SEO_DATA_DEFAULT', function ($prev) {
                return [
                    ...$prev,
                    'title' => setting('PLATFORM_HOMEPAGE_TITLE'),
                    'description' => setting('PLATFORM_HOMEPAGE_DESCRIPTION'),
                ];
            });
            return $prev;
        });
        
        Platform::Ready(function () {

            $this->app->register(ShortcodeserviceProvider::class);
            $this->app->register(ShortcodesServerProvider::class);
            MenuRender::RegisterType(MenuItemPage::class);
            MenuRender::RegisterType(MenuItemPost::class);
            MenuRender::RegisterType(MenuItemCategory::class);
            if (sokeio_is_admin()) {

                add_action('THEME_ADMIN_RIGHT', function () {
                    echo '<div class="nav-item"><a class="nav-link fw-bold" target="_blank" href="' . url('/') . '">' . __('Visit Website') . '</a></div>';
                });
                add_filter('SOKEIO_ADMIN_SETTING_OVERVIEW', function ($prev) {
                    return [
                        ...$prev,
                        UI::Column6([
                            UI::Select('PLATFORM_HOMEPAGE')->Label(__('Homepage'))->DataSource(function () {
                                return [
                                    [
                                        'id' => '',
                                        'name' => 'None'
                                    ],
                                    ...Page::query()->where('status', 'published')->get(['id', 'name'])
                                ];
                            })
                        ]),
                        UI::Column6([
                            UI::Checkbox('PLATFORM_HIDE_PANEL_CMS')->Label(__('CMS Site Panel'))->Title('Hide CMS Panel on Site')
                        ]),
                        UI::Column6([
                            UI::Text('PLATFORM_SITE_NAME')->Label(__('Site Name'))->ValueDefault(function () {
                                return 'Sokeio';
                            })
                        ]),
                        UI::Column6([
                            UI::Image('PLATFORM_SITE_LOGO')->Label(__('Site Logo'))
                        ]),
                        UI::Column12([
                            UI::Text('PLATFORM_HOMEPAGE_TITLE')->Label(__('Homepage title'))
                        ]),
                        UI::Column12([
                            UI::Textarea('PLATFORM_HOMEPAGE_DESCRIPTION')->Label(__('Homepage Description'))
                        ]),
                    ];
                });
                add_filter(PLATFORM_CONFIG_JS, function ($rs) {
                    return [
                        ...$rs,
                        'sokeio_shortcode_setting' => [
                            'title' => __('Shortcode Setting'),
                            'url' => route('admin.shortcode-setting'),
                            'size' => 'modal-fullscreen-md-down modal-xl',
                        ],
                    ];
                });
                Menu::Register(function () {
                    if (!sokeio_is_admin()) return;
                    menu_admin()
                        ->route(['name' => 'admin.page', 'params' => []], 'Pages', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-pagekit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12.077 20h-5.077v-16h11v14h-5.077"></path>
             </svg>', [], 'admin.page')
                        ->subMenu('Posts', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                <path d="M9 9l1 0"></path>
                <path d="M9 13l6 0"></path>
                <path d="M9 17l6 0"></path>
             </svg>', function (MenuBuilder $menu) {
                            $menu->setTargetId('cms_post_menu');
                            $menu->route(['name' => 'admin.post', 'params' => []], 'Posts', '', [], 'admin.post');
                            $menu->route(['name' => 'admin.catalog', 'params' => []], 'Catalogs', '', [], 'admin.catalog');
                            $menu->route(['name' => 'admin.tag', 'params' => []], 'Tags', '', [], 'admin.tag');
                        })
                        ->attachMenu('system_appearance_menu', function (MenuBuilder $menu) {
                            $menu->route(['name' => 'admin.menu', 'params' => []], 'Menus', '', [], 'admin.menu');
                        });
                });
            }
        });
    }
}
