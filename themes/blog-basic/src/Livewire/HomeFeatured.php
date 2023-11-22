<?php
namespace Sokeio\BlogTheme\Livewire;
use Sokeio\Component;

class HomeFeatured extends Component {

    public function render() {
        page_title('Home');
        return view('theme::pages.home-featured');
    }
}