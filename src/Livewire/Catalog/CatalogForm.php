<?php

namespace Sokeio\Cms\Livewire\Catalog;

use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Cms\Models\Catalog;

class CatalogForm extends Form
{
    public function getTitle()
    {
        return __('Catalog');
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
        return Catalog::class;
    }


    public function FormUI()
    {
        return UI::Container([
            UI::Prex(
                'data',
                [
                    UI::Hidden('author_id')->ValueDefault(auth()->user()->id),
                    UI::Row([
                        UI::Column12([
                            UI::Text('name')->Label(__('Title'))->required(),
                            UI::Text('slug')->Label(__('Slug')),
                            UI::Image('image')->Label(__('Image')),
                            UI::Row([
                                UI::Column6([
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
                                ]),
                                UI::Column6([
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
                                ])
                            ]),

                            UI::Row([
                                UI::Column6(UI::Checkbox('is_featured')->Label(__('Featured'))->ValueDefault(0)),
                                UI::Column6(UI::Checkbox('is_default')->Label(__('Default'))->ValueDefault(0))
                            ]),
                            UI::Textarea('description')->Label(__('Description')),
                        ])
                    ]),
                ]
            )
        ])
            ->ClassName('p-3');
    }
}
