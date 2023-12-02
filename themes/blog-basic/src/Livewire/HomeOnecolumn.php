<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class HomeOnecolumn extends Component {

    public function render() {
        page_title('Home');
        return view('theme::pages.home-onecolumn');
    }
}