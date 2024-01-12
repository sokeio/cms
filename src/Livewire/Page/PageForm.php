<?php

namespace Sokeio\Cms\Livewire\Page;

use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Cms\Models\Page;
use Sokeio\Components\Concerns\WithFormLang;
use Sokeio\Models\Language;

class PageForm extends Form
{
    use WithFormLang;
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
  
    public function FormUI()
    {
        return UI::Container([
            UI::Row([
                UI::Column12([
                    UI::ButtonList(function () {
                        return UI::ForEach(Language::query()->where('status', 1)->get(), [
                            UI::Button(function ($item) {
                                return sokeio_flags($item->getEachData()->flag, '1x1');
                            })->DisableCache()->WireClick(function ($item) {
                                return 'changeLangeuage(\'' . $item->getEachData()->code . '\')';
                            })->Small()->ButtonColor('-icon')->ClassName(function ($item) {
                                return $this->lang === $item->getEachData()->code ? 'btn-primary' : '  ';
                            })
                        ]);
                    })->Label(__('Langues'))->NoSort()
                ])
            ]),
            UI::Prex(
                'data',
                [
                    UI::Row([
                        UI::Column12([
                            UI::Text('name')->Label(__('Title'))->required()
                        ]),
                        UI::Column12([
                            UI::Text('slug')->Label(__('Slug'))
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
