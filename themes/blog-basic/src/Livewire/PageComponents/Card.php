<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class Card extends Component {
    public function render() {
        page_title('Card');
        return view('theme::pages.components.card');
    }
}