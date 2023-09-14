<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Card extends Component {
    public function render() {
        page_title('Card');
        return view('theme::pages.components.card');
    }
}