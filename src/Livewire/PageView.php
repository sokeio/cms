<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Cms\Models\Page;
use Sokeio\Component;
use Sokeio\Facades\Assets;
use Sokeio\Facades\Theme;

class PageView extends Component
{
    public Page $page;
    public function mount()
    {
        if ($this->page->layout) {
            Theme::setLayout($this->page->layout);
        }
        SeoHelper()->for($this->page);
        if ($this->page->css)
            Assets::AddStyle($this->page->css ?? '');
        if ($this->page->custom_css)
            Assets::AddStyle($this->page->custom_css ?? '');
        if ($this->page->js)
            Assets::AddScript($this->page->js ?? '');
        if ($this->page->custom_js)
            Assets::AddScript($this->page->custom_js ?? '');
        Assets::setTitle($this->page->name);
        if ($this->page->id == setting('PLATFORM_HOMEPAGE')) {
            Assets::setTitle(setting('PLATFORM_HOMEPAGE_TITLE'));
            Assets::setDescription(setting('PLATFORM_HOMEPAGE_DESCRIPTION'));
        }
    }
    public function render()
    {
        return view_scope('cms::page', ['page' => $this->page]);
    }
}
