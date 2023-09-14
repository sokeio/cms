<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class HomeThreecolumn extends Component {

    public function render() {
        page_title('Home');
        return view('theme::pages.home-threecolumn');
    }
}