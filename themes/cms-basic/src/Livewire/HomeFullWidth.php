<?php
namespace Sokeio\ThemeCms\Livewire;
use Sokeio\Component;

class HomeFullWidth extends Component {

    public function render() {
        page_title('Home');
        return view('theme::pages.home-fullwidth');
    }
}