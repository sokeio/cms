<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Table extends Component {
    public function render() {
        page_title('Table');
        return view('theme::pages.components.table');
    }
}