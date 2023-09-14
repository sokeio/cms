<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Alert extends Component {
    public function render() {
        page_title('Alert');
        return view('theme::pages.components.alert');
    }
}