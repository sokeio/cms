<?php

namespace Sokeio\Cms\Livewire\Tag;

use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Cms\Models\Tag;

class TagForm extends Form
{
    public function getTitle()
    {
        return __('Tag');
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
        return Tag::class;
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
