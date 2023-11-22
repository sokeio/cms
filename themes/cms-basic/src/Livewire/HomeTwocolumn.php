<?php
namespace Sokeio\ThemeSokeio\Livewire;
use Sokeio\Component;

class HomeTwocolumn extends Component {

    public function render() {
        page_title('Home');
        return view('theme::pages.home-twocolumn');
    }
}