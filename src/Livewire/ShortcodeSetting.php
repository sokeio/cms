<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Cms\Facades\Shortcode;
use Sokeio\Components\FormSettingCallback;
use Sokeio\Components\UI;

class ShortcodeSetting extends FormSettingCallback
{
    public function SettingUI(){
        return UI::Div('test');
    }
    public function getItemManager()
    {
        return Shortcode::getShortCodeByKey($this->dataSetting->shortcode);
    }
    private function getShortCodeHtml()
    {
        $html = '[' . $this->shortcode;
        if ($items = $this->getItemManager()?->getItems()) {
            foreach ($items as $item) {
                $value = $this->getValueText($item->getField());
                if ($value) {
                    $html .= ' ' . $item->getField() . '="' . $value . '"';
                }
            }
        }

        $html .= ']' . $this->Base64Encode($this->children) . '[/' . $this->shortcode . ']';
        return   $html;
    }
    public function getShortCodeHtml2()
    {
        $this->closeComponent();
        $this->skipRender();
        return $this->getShortCodeHtml();
    }
    public function doPreview()
    {
        $this->skipRender();
        $shortcode = $this->getShortCodeHtml();
        $shortcodeHtml = shortcode_render($shortcode);
        $pattern = '/wire:id="([^"]+)"/';
        $wireId = '';
        if (preg_match($pattern, $shortcodeHtml, $matches)) {
            $wireId = $matches[1];
        }
        return [
            'shortcode' => $shortcode,
            'shortcodeHtml' => $shortcodeHtml,
            'wireId' => $wireId
        ];
    }
}
