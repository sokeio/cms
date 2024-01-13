<?php

namespace Sokeio\Cms\Livewire\Post;

use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Cms\Models\Catalog;
use Sokeio\Cms\Models\Post;

class PostForm extends Form
{
    public $categorieids = [];
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

    protected function FooterUI()
    {
        return null;
    }
    public function FormUI()
    {
        return UI::Container([
            UI::Prex(
                'data',
                [
                    UI::Hidden('author_id')->ValueDefault(auth()->user()->id),
                    UI::Row([
                        UI::Column8([
                            UI::Text('name')->Label(__('Title'))->required(),
                            UI::Text('slug')->Label(__('Slug')),
                            UI::Tinymce('content')->Label(__('Content'))->required(),
                            UI::Textarea('description')->Label(__('Description')),
                            UI::Textarea('custom_js')->Label(__('Custom Js')),
                            UI::Textarea('custom_css')->Label(__('Custom CSS')),
                        ]),
                        UI::Column4([
                            UI::Select('status')->Label(__('Status'))->DataSource(function () {
                                return [
                                    [
                                        'id' => 'draft',
                                        'name' => __('Draft')
                                    ],
                                    [
                                        'id' => 'published',
                                        'name' => __('Published')
                                    ]
                                ];
                            })->ValueDefault('published'),
                            UI::Image('image')->Label(__('Image')),
                            UI::CheckboxMutil('categorieids')->Prex('')->Label(__('Categories'))->DataSource(function () {
                                return Catalog::query()->where('status', 'published')->get();
                            })->NoSave(),
                            UI::Select('layout')->Label(__('Layout'))->DataSource(function () {
                                return [
                                    [
                                        'id' => 'default',
                                        'name' => __('Default')
                                    ],
                                    [
                                        'id' => 'none',
                                        'name' => __('None')
                                    ],
                                ];
                            }),
                            UI::Button(__('Save article'))->WireClick('doSave()')->ClassName('w-100 mb-2'),
                        ]),
                    ]),
                ]
            )
        ])
            ->ClassName('p-3');
    }
}
