<?php

namespace Sokeio\CMS;

use Illuminate\Support\Facades\Facade;
use Sokeio\CMS\Support\Template\TemplateManager;

/**
 * @see \Sokeio\CMS\Template
 *
 * @method static mixed getTemplates()
 * @method static void register($template, $content)
 */

class Template extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TemplateManager::class;
    }
}
