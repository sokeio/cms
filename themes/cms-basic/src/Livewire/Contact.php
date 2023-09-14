<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Contact extends Component {
    public function render() {
        page_title('Contact');
        return view('theme::pages.contact');
    }
}