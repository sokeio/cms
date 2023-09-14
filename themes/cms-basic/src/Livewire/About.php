<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class About extends Component {
    public function render() {
        page_title('Page About');
        return view('theme::pages.about');
    }
}