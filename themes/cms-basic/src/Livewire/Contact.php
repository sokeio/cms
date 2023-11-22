<?php
namespace Sokeio\ThemeCms\Livewire;
use Sokeio\Component;

class Contact extends Component {
    public function render() {
        page_title('Contact');
        return view('theme::pages.contact');
    }
}