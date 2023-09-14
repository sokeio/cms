<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class HomeFeatured extends Component {

    public function render() {
        page_title('Home');
        return view('theme::pages.home-featured');
    }
}