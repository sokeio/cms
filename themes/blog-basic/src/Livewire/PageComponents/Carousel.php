<?php
namespace Sokeio\CmsTheme\Livewire;
use Sokeio\Component;

class Carousel extends Component {
    public function render() {
        page_title('Carousel');
        return view('theme::pages.components.carousel');
    }
}