<?php

namespace Sokeio\Cms\Livewire\Tag;

use Sokeio\Cms\Models\Tag;
use Sokeio\Components\Table;
use Sokeio\Components\UI;

class TagTable extends Table
{
    protected function getModel()
    {
        return Tag::class;
    }
    public function getTitle()
    {
        return __('Tag Manager');
    }
    protected function getRoute()
    {
        return 'admin.tag';
    }
    public function getColumns()
    {
        return [
            UI::Text('name')->Label(__('Title'))->FieldValue(function ($item) {
                return  "<a href='" . route('tag.slug', $item->slug) . "' title='{$item->name}' target='_blank'>{$item->name}</a>";
            }),
            UI::Text('status')->Label(__('Status'))->NoSort(),
            UI::Text('created_at')->Label(__('Created At')),
            UI::Text('updated_at')->Label(__('Updated At')),
        ];
    }
}
