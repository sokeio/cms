<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class PostVideo extends Component {
    public function render() {
        page_title('Post Video');
        return view('theme::pages.post-video');
    }
}