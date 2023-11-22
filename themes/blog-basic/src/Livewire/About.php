<?php
namespace Sokeio\BlogTheme\Livewire;
use Sokeio\Component;

class About extends Component {
    public function render() {
        page_title('Page About');
        return view('theme::pages.about');
    }
}