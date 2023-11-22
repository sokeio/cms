<?php
namespace Sokeio\ThemeCms\Livewire;
use Sokeio\Component;

class Typography extends Component {
    public function render() {
        page_title('Typography');
        return view('theme::pages.components.typography');
    }
}