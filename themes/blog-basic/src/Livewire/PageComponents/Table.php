<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class Table extends Component {
    public function render() {
        page_title('Table');
        return view('theme::pages.components.table');
    }
}