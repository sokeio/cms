<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class Modal extends Component {
    public function render() {
        page_title('Modal');
        return view('theme::pages.components.modal');
    }
}