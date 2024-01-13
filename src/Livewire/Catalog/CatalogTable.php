<?php

namespace Sokeio\Cms\Livewire\Catalog;

use Sokeio\Cms\Models\Catalog;
use Sokeio\Components\Table;
use Sokeio\Components\UI;

class CatalogTable extends Table
{
    protected function getModel()
    {
        return Catalog::class;
    }
    public function getTitle()
    {
        return __('Catalog');
    }
    protected function getRoute()
    {
        return 'admin.catalog';
    }
    // protected function getButtons()
    // {
    //     return [
    //         UI::ButtonCreate(__('Create'))->ModalRoute($this->getRoute() . '.add')->ModalTitle(__('Create Data'))->ModalFullscreen(),
    //     ];
    // }
    // protected function getTableActions()
    // {
    //     return [
    //         UI::ButtonEdit(__('Edit'))->ModalRoute($this->getRoute() . '.edit', function ($row) {
    //             return [
    //                 'dataId' => $row->id
    //             ];
    //         })->ModalTitle(__('Edit Data'))->ModalFullscreen(),
    //         UI::ButtonRemove(__('Remove'))->Confirm(__('Do you want to delete this record?'), 'Confirm')->WireClick(function ($item) {
    //             return 'doRemove(' . $item->getDataItem()->id . ')';
    //         })
    //     ];
    // }
  
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
