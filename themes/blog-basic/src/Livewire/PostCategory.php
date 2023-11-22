<?php

namespace Sokeio\BlogTheme\Livewire;

use Sokeio\Blog\Models\Post;
use Sokeio\Component;

class PostCategory extends Component
{
    public function render()
    {
        page_title('Post Category');
        $posts = Post::query()->where('status', '<>', '0')->get([
            'id',
            'name',
            'slug',
            'description',
            'image',
            'created_at'
        ]);
        return view('theme::pages.category',['posts'=>$posts]);
    }
}
