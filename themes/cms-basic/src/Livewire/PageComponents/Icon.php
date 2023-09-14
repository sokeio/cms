<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Icon extends Component {
    public function render() {
        page_title('Icon');
        return view('theme::pages.components.icon');
    }
}