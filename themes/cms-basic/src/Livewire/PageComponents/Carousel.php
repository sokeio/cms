<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Carousel extends Component {
    public function render() {
        page_title('Carousel');
        return view('theme::pages.components.carousel');
    }
}