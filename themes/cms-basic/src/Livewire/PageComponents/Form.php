<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Form extends Component {
    public function render() {
        page_title('Form');
        return view('theme::pages.components.form');
    }
}