<?php

namespace Sokeio\CmsTheme;

use Sokeio\Components\Common\Tab;
use Sokeio\Components\UI;
use Sokeio\PlatformOperation;

class Option extends PlatformOperation
{
    // Only Theme Site
    public static function SetupOption()
    {
        theme_option()->optionUI([
            UI::Tab()
                ->addTab(Tab::TabItem('General'), [
                    UI::Row([
                        UI::Column6([
                            UI::Text('site_name')->Label(__('Site Name')),
                        ]),
                        UI::Column6([
                            UI::Image('site_logo')->Label(__('Site Logo')),
                        ])
                    ])

                ])->addTab(Tab::TabItem('Footer'), [
                    UI::Color('footer_color')->Label(__('Color Footer')),
                    UI::Row([
                        UI::Column3([
                            UI::Text('footer_column_title1')->Label(__('Footer column 1')),
                        ]),
                        UI::Column3([
                            UI::Text('footer_column_title2')->Label(__('Footer column 2')),
                        ]),
                        UI::Column3([
                            UI::Text('footer_column_title3')->Label(__('Footer column 3')),
                        ]),
                        UI::Column3([
                            UI::Text('footer_column_title4')->Label(__('Footer column 4')),
                        ]),
                    ]),
                    UI::Tinymce('footer_about')->Label(__('Footer About')),

                ])->addTab(Tab::TabItem('Header'), [
                    UI::Color('header_color')->Label(__('Color Header')),
                ])->addTab(Tab::TabItem('Customize'), [
                    UI::Textarea('custom_css')->Label(__('Custom CSS')),
                    UI::Textarea('custom_js')->Label(__('Custom JS')),
                ]),

        ]);
        // Run when activating
    }
    public static function activate()
    {
        // Run when activating
    }

    public static function activated()
    {
        // Run when is activated
    }

    public static function deactivate()
    {
        // Run when deactivating 
    }

    public static function deactivated()
    {
        // Run when is deactivated
    }

    public static function remove()
    {
        // Run when remove 
    }

    public static function removed()
    {
        // Run when removed
    }
}
