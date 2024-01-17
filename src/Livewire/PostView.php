<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Cms\Models\Post;
use Sokeio\Component;
use Sokeio\Facades\Assets;
use Sokeio\Facades\Theme;

class PostView extends Component
{
    public Post $post;
    public function mount()
    {
        if ($this->post->layout) {
            Theme::setLayout($this->post->layout);
        }
        Theme::setTitle($this->post->title);
        if ($this->post->css)
            Assets::AddStyle($this->post->css ?? '');
        if ($this->post->custom_css)
            Assets::AddStyle($this->post->custom_css ?? '');
        if ($this->post->js)
            Assets::AddScript($this->page->js ?? '');
        if ($this->post->custom_js)
            Assets::AddScript($this->post->custom_js ?? '');
    }
    public function render()
    {
        Theme::setTitle('xin cahò');
        return view_scope('cms::post', ['post' => $this->post]);
    }
}
