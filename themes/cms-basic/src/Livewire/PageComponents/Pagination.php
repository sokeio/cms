<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Pagination extends Component {
    public function render() {
        page_title('Pagination');
        return view('theme::pages.components.pagination');
    }
}