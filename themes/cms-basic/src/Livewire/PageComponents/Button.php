<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Button extends Component {
    public function render() {
        page_title('Button');
        return view('theme::pages.components.button');
    }
}