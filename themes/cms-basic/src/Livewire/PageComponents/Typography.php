<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Typography extends Component {
    public function render() {
        page_title('Typography');
        return view('theme::pages.components.typography');
    }
}