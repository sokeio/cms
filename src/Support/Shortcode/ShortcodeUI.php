<?php

namespace Sokeio\CMS\Support\Shortcode;

use Sokeio\CMS\Shortcode;
use Sokeio\ILoader;
use Sokeio\Support\Platform\ItemInfo;
use Sokeio\UI\BaseUI;

class ShortcodeUI extends BaseUI implements ILoader
{
    public static function runLoad(ItemInfo $itemInfo)
    {
        Shortcode::register(static::class);
    }
    protected function base64Encode($text)
    {
        return base64_encode(urlencode($text ?? ''));
    }
    private $info;
    private $dataParam = [];
    private $content = null;
    public function setDataParam($data)
    {
        $this->dataParam = $data;
        return $this;
    }
    public function getDataParam($key, $default = '')
    {
        return data_get($this->dataParam, $key, $default);
    }
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getInfo(): ShortcodeInfo
    {
        return $this->info ?? ($this->info = ShortcodeInfo::getInfoFromUI(self::class));
    }
    public static function paramUI()
    {
        return [];
    }
}
