<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class Button extends Component {
    public function render() {
        page_title('Button');
        return view('theme::pages.components.button');
    }
}