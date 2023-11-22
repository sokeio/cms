<?php
namespace Sokeio\ThemeSokeio\Livewire;
use Sokeio\Component;

class PostVideo extends Component {
    public function render() {
        page_title('Post Video');
        return view('theme::pages.post-video');
    }
}