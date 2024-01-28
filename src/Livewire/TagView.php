<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Cms\Models\Tag;
use Sokeio\Component;
use Sokeio\Facades\Assets;
use Sokeio\Facades\Theme;

class TagView extends Component
{
    public Tag $tag;
    public function mount()
    {
        if ($this->tag->layout) {
            Theme::setLayout($this->tag->layout);
        }
        if ($this->tag->css)
            Assets::AddStyle($this->tag->css ?? '');
        if ($this->tag->custom_css)
            Assets::AddStyle($this->tag->custom_css ?? '');
        if ($this->tag->js)
            Assets::AddScript($this->tag->js ?? '');
        if ($this->tag->custom_js)
            Assets::AddScript($this->tag->custom_js ?? '');
        Assets::setTitle($this->tag->name);
        SeoHelper()->for($this->tag);
    }
    public function render()
    {
        return view_scope('cms::tag', ['tag' => $this->tag]);
    }
}
