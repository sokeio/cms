<?php

namespace Sokeio\Cms\Shortcode;

use Sokeio\Laravel\BaseCallback;

class Shortcode extends BaseCallback
{
    public function boot()
    {
    }
    protected function getAttributeValue($key)
    {
        if (isset($this->getManager()?->attrs[$key])) {
            return $this->getManager()?->attrs[$key];
        }
        return null;
    }

    public static function getName()
    {
    }
    public static function getKey()
    {
    }
    public static function getParamUI()
    {
        return [];
    }
    public static function EnableChildContent()
    {
        return true;
    }

    public function renderHtml(ShortcodeInfo $shortcode, ShortcodeManager $manager, $viewData = [])
    {
    }
    public function lazyloadView()
    {
        return null;
    }
    public function getView()
    {
        return 'cms::shortcode.post';
    }
    public function getData()
    {
        return [];
    }
}
