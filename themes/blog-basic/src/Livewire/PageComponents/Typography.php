<?php
namespace Sokeio\BlogTheme\Livewire;
use Sokeio\Component;

class Typography extends Component {
    public function render() {
        page_title('Typography');
        return view('theme::pages.components.typography');
    }
}