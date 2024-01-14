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
            UI::Text('name')->Label(__('Name')),
            UI::Text('slug')->Label(__('Slug')),
            UI::Text('status')->Label(__('Status'))->NoSort(),
            UI::Text('created_at')->Label(__('Created At')),
            UI::Text('updated_at')->Label(__('Updated At')),
        ];
    }
}
