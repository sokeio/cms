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
    private $shortcodeInst;
    private $viewShortcodeClass;

    public function mount()
    {
    }
    protected function getListeners()
    {
        return [
            ...parent::getListeners(),
            'refreshData' . $this->shortcode => '__loadData',
        ];
    }
    protected function getShortcode()
    {
        if ($this->shortcodeInst) return $this->shortcodeInst;
        if (!$this->shortcode) {
            return;
        }
        $this->viewShortcodeClass = FacadesShortcode::getShortCodeByKey($this->shortcode);
        $this->shortcodeInst = app($this->viewShortcodeClass);
        $this->shortcodeInst->Manager($this)->boot();
        return $this->shortcodeInst;
    }
    public function render()
    {
        return view('cms::shortcode', [
            'shortcode' => $this->shortcode,
            'shortcodeView' => $this->getShortcode()?->getView(),
            'attrs' => $this->attrs,
            'content' => $this->content,
            'shortcodeData' => $this->getShortcode()?->getData() ?? [],
            'component' => $this
        ]);
    }
}
