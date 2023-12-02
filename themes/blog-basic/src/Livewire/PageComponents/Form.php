<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class Form extends Component {
    public function render() {
        page_title('Form');
        return view('theme::pages.components.form');
    }
}