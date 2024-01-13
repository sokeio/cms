<?php

namespace Sokeio\Cms\Livewire\Page;

use Sokeio\Cms\Models\Page;
use Sokeio\Components\Table;
use Sokeio\Components\UI;
use Sokeio\Models\Language;

class PageTable extends Table
{
    // public  $langs = [];
    // public function mount()
    // {
    //     // parent::mount();
    //     $this->langs = Language::query()->where('status', 1)->get();
    // }
    protected function getModel()
    {
        return Page::class;
    }
    public function getTitle()
    {
        return __('Page');
    }
    protected function getRoute()
    {
        return 'admin.page';
    }
    protected function getButtons()
    {
        return [
            UI::ButtonCreate(__('Create'))->ModalRoute($this->getRoute() . '.add')->ModalTitle(__('Create Data'))->ModalFullscreen(),
        ];
    }
    protected function getTableActions()
    {
        return [
            UI::ButtonEdit(__('Edit'))->ModalRoute($this->getRoute() . '.edit', function ($row) {
                return [
                    'dataId' => $row->id
                ];
            })->ModalTitle(__('Edit Data'))->ModalFullscreen(),
            UI::ButtonRemove(__('Remove'))->Confirm(__('Do you want to delete this record?'), 'Confirm')->WireClick(function ($item) {
                return 'doRemove(' . $item->getDataItem()->id . ')';
            })
        ];
    }
    public function getColumns()
    {
        return [
            UI::Text('name')->Label(__('Title')),
            UI::Text('slug')->Label(__('Slug')),
            UI::Text('status')->Label(__('Status'))->NoSort(),
            UI::Text('created_at')->Label(__('Created At')),
            UI::Text('updated_at')->Label(__('Updated At')),
            // UI::ButtonList(UI::ForEach($this->langs, [
            //     UI::Button(function ($item) {
            //         return sokeio_flags($item->getEachData()->flag, '1x1');
            //     })->ModalRoute($this->getRoute() . '.edit', function ($row, $item) {
            //         return  ['dataId' => $row->id, 'lang' => $item->getEachData()->code];
            //     })->ModalTitle(__('Edit Data'))->ModalFullscreen()->When(function ($item) {
            //         return $item->getEachData()->flag != '';
            //     })->Small()->ButtonColor('-icon')
            // ]))->Label(__('Languages'))->NoSort()
        ];
    }
}
