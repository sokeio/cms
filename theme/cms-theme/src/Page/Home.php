<?php

namespace Sokeio\Theme\CMS\Page;

use Sokeio\Support\Livewire\PageInfo;
use Sokeio\Theme;

#[PageInfo(url: '/', title: 'Home')]
class Home extends \Sokeio\Page
{
    public function render()
    {
        return Theme::view('pages.home');
    }
}
