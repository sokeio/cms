<?php

namespace Sokeio\Cms\Livewire\Post;

use Sokeio\Cms\Models\Catalog;
use Sokeio\Cms\Models\Post;
use Sokeio\Components\Table;
use Sokeio\Components\UI;

class PostTable extends Table
{

    protected function getModel()
    {
        return Post::class;
    }
    public function getTitle()
    {
        return __('Post');
    }
    protected function searchUI()
    {
        return [
            UI::Row([
                UI::Column12([
                    UI::Select('catalogs.id')->Label(__('Category'))->DataSource(function () {
                        return Catalog::query()->where('status', 'published')->get(['id', 'name']);
                    }),
                ])
            ])

        ];
    }
    protected function getRoute()
    {
        return 'admin.post';
    }
    protected function getButtons()
    {
        return apply_filters('CMS_POST_BUTTONS', [
            UI::ButtonCreate(__('Create'))->ModalRoute($this->getRoute() . '.add')->ModalTitle(__('Create Data'))->ModalFullscreen(),
        ]);
    }
    protected function getTableActions()
    {
        return apply_filters('CMS_POST_TABLE_ACTIONS', [
            UI::ButtonEdit(__('Edit'))->ModalRoute($this->getRoute() . '.edit', function ($row) {
                return [
                    'dataId' => $row->id
                ];
            })->ModalTitle(__('Edit Data'))->ModalFullscreen(),
            UI::ButtonRemove(__('Remove'))->Confirm(__('Do you want to delete this record?'), 'Confirm')->WireClick(function ($item) {
                return 'doRemove(' . $item->getDataItem()->id . ')';
            })
        ]);
    }
    public function getColumns()
    {
        return [
            UI::Text('name')->Label(__('Title'))->FieldValue(function ($item) {
                return  "<a href='" . route('post.slug', $item->slug) . "' title='{$item->name}' target='_blank'>{$item->name}</a>";
            }),
            UI::Text('slug')->Label(__('Slug')),
            UI::Text('status')->Label(__('Status'))->NoSort(),
            UI::Text('created_at')->Label(__('Created At')),
            UI::Text('updated_at')->Label(__('Updated At')),
        ];
    }
}
