<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class Alert extends Component {
    public function render() {
        page_title('Alert');
        return view('theme::pages.components.alert');
    }
}