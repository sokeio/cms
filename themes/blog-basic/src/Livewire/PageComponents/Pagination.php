<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class Pagination extends Component {
    public function render() {
        page_title('Pagination');
        return view('theme::pages.components.pagination');
    }
}