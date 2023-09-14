<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Modal extends Component {
    public function render() {
        page_title('Modal');
        return view('theme::pages.components.modal');
    }
}