<?php

namespace Sokeio\CmsTheme;

use Sokeio\Components\UI;
use Sokeio\PlatformOperation;

class Option extends PlatformOperation
{
    // Only Theme Site
    public static function SetupOption()
    {
        theme_option()->optionUI([
            UI::Row([
                UI::Column6([
                    UI::Text('HEADER_TEST')->Label('Label')
                ])
            ])
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
