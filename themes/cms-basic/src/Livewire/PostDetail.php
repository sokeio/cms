<?php

namespace Sokeio\ThemeSokeio\Livewire;

use Sokeio\Sokeio\Models\Post;
use Sokeio\Component;

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
