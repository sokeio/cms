<?php

namespace Sokeio\CMS\Shortcode;

use Sokeio\CMS\Support\Shortcode\ShortcodeInfo;
use Sokeio\CMS\Support\Shortcode\ShortcodeUI;

#[ShortcodeInfo('cms::demo', 'Demo', 'mdi-24px', true)]
class Demo extends ShortcodeUI
{
    public function view()
    {
        return <<<HTML
            <div class="demo">
                <h1>Hello, World!</h1>
            </div>
        HTML;
    }
}
