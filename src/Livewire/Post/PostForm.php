<?php

namespace Sokeio\Cms\Livewire\Post;

use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Cms\Models\Post;
use Sokeio\Components\Concerns\WithFormLang;

class PostForm extends Form
{
    use WithFormLang;

    public function getTitle()
    {
        return __('Post');
    }
    public function getBreadcrumb()
    {
        return [
            Breadcrumb::Item(__('Home'), route('admin.dashboard'))
        ];
    }
    public function getButtons()
    {
        return [];
    }
    public function getModel()
    {
        return Post::class;
    }

    public function FormUI()
    {
        return UI::Container([
            UI::Prex(
                'data',
                [
                    UI::Row([
                        UI::Column12([
                            UI::Text('name')->Label(__('Role Name'))->required()
                        ]),
                        UI::Column12([
                            UI::Text('slug')->Label(__('Role Slug'))
                        ]),
                        UI::Column12([
                            UI::Tinymce('content')->Label(__('Content'))->required()
                        ]),
                    ]),
                ]
            )
        ])
            ->ClassName('p-3');
    }
}
