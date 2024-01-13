<?php

namespace Sokeio\Cms\Livewire\Page;

use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Cms\Models\Page;
use Sokeio\Models\Language;

class PageForm extends Form
{
    public  $langs = [];
    public function mount()
    {
        $this->loadData();
        $this->langs = Language::query()->where('status', 1)->get();
    }
    public function getTitle()
    {
        return __('Page');
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
        return Page::class;
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
                            // UI::DatePicker('published_at')->Label(__('Published At')),
                            UI::Image('image')->Label(__('Image')),

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
