<?php

namespace BytePlatform\ThemeCms\Livewire;

use BytePlatform\Cms\Models\Post;
use BytePlatform\Component;

class PostDetail extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        page_title($this->post->name);
        return view('theme::pages.post-detail', ['post' => $this->post])->withShortcodes();
    }
}
