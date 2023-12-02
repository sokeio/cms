<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class HomeThreecolumn extends Component {

    public function render() {
        page_title('Home');
        return view('theme::pages.home-threecolumn');
    }
}