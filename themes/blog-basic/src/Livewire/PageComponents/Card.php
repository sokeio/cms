<?php
namespace Sokeio\BlogTheme\Livewire;
use Sokeio\Component;

class Card extends Component {
    public function render() {
        page_title('Card');
        return view('theme::pages.components.card');
    }
}