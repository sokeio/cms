<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Component;
use Sokeio\Cms\Facades\Shortcode as FacadesShortcode;
use Livewire\Attributes\Reactive;

class Shortcode extends Component
{
    #[Reactive]
    public $shortcode;
    #[Reactive]
    public $attrs = [];
    #[Reactive]
    public $content;
    protected function getListeners()
    {
        return [
            ...parent::getListeners(),
            'refreshData' . $this->shortcode => '__loadData',
        ];
    }
    protected function getItemManager()
    {
        if (!$this->shortcode) {
            return;
        }
        return FacadesShortcode::getShortCodeByKey($this->shortcode);
    }
    public function render()
    {
        return view('cms::shortcode', add_filter(PLATFORM_SHORTCODE_MANAGER, [
            'shortcode' => $this->shortcode,
            'attrs' => $this->attrs,
            'content' => $this->content,
            'component' => $this
        ]));
    }
}
