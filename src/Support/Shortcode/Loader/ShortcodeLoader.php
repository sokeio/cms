<?php

namespace Sokeio\CMS\Support\Shortcode\Loader;

use Closure;
use Illuminate\Support\Facades\File;
use Sokeio\CMS\Template;
use Sokeio\Platform;
use Sokeio\Support\Platform\IPipeLoader;
use Sokeio\Support\Platform\ItemInfo;

class ShortcodeLoader implements IPipeLoader
{
    public function handle(ItemInfo $item, Closure $next): mixed
    {
        Platform::runLoader(
            $item,
            $item->getPackage()->basePath('Shortcode'),
            $item->namespace . '\\Shortcode',
            $item->getPackage()->shortName() . '::shortcode'
        );
        return $next($item);
    }
}
