<?php

namespace Sokeio\CMS\Support\Shortcode;

use Livewire\Attributes\Locked;
use Sokeio\CMS\Shortcode;
use Sokeio\Component;
use Sokeio\UI\WithUI;

class ShortcodeComponent extends Component
{
    use WithUI;
    #[Locked]
    public $shortcode = '';
    #[Locked]
    public $attrs = [];
    #[Locked]
    public $content = '';
    protected function setupUI()
    {
        $ui = (Shortcode::getShortcode($this->shortcode, 'class'));

        if ($ui && class_exists($ui)) {
            return ($ui)::init()->setDataParam($this->attrs)->setContent($this->content);
        }
        return [];
    }
}
