<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class Icon extends Component {
    public function render() {
        page_title('Icon');
        return view('theme::pages.components.icon');
    }
}