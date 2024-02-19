<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Cms\Facades\Shortcode;
use Sokeio\Components\FormSettingCallback;
use Sokeio\Components\UI;

class ShortcodeSetting extends FormSettingCallback
{
    public function SettingUI()
    {
        $shortcode = Shortcode::getShortCodeByKey($this->data->shortcode);
        $this->showMessage($this->data->shortcode);
        return UI::Row([
            UI::Column4([
                UI::Select('shortcode')->Label(__('Shortcode'))->required()->DataSource(function () {
                    return [
                        [
                            'id' => '',
                            'name' => __('None')
                        ],
                        ...collect(Shortcode::getRegistered())->map(function ($item, $key) {
                            return [
                                'id' => $key,
                                'name' => ($item)::getName()
                            ];
                        })->toArray()
                    ];
                })->WireLive(),
                ...($shortcode) ? ($shortcode)::getParamUI() : []
            ])
        ]);
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
