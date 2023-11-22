<?php

namespace  Sokeio\Blog\Crud;

use Sokeio\Button;
use Sokeio\Blog\Models\Catalog;
use Sokeio\CrudManager;
use Sokeio\Item;
use Sokeio\ItemManager;

class CatalogCrud extends CrudManager
{
    public function GetModel()
    {
        return Catalog::class;
    }
    public function GetFields()
    {
        return [
            Item::Add('id')->Title('ID')->DisableFilter()->DisableSort()->When(function ($item, $manager) {
                return $manager->IsTable();
            })->DisableEdit(),
            Item::Add('name')->Column(Item::Col12)->Title('Name')->Required(),
            Item::Add('slug')->Title('Slug')->When(function ($item, $manager) {
                return $manager->IsTable();
            })->DisableEdit(),
            Item::Add('description')->Title('description')->Type('textarea')->Column(Item::Col12)->Required()->When(function ($item, $manager) {
                return !$manager->IsTable();
            }),
            Item::Add('status')->Title('status')->DataOptionStatus()->DataText(function (Item $item) {
                $button = $item->ConvertToButton()
                    ->Title(function ($button) {
                        $item = $button->getData();
                        return $item->status ? 'Active' : 'Block';
                    })->ButtonType(function ($button) {
                        $item = $button->getData();
                        return $item->status ? 'success' : 'danger';
                    });
                if ($button->getWhen()) {
                    $button->WireClick(function ($button) {
                        $item = $button->getData();
                        return "callDoAction('changeStatus',{'id':" . $item->id . ",'status':" . ($item->status == 1 ? 0 : 1) . "})";
                    });
                }
                return $button->render();
            })->DisableEdit(function ($item, $manager) {
                return !$manager->IsTable();
            }),
        ];
    }

    public function TablePage()
    {
        return ItemManager::Table()
            ->Model($this->GetModel())
            // ->EditInTable()
            ->Title('Catalog Manager')
            ->Filter()
            ->Sort()
            ->CheckBoxRow()

            ->ButtonOnPage(function () {
                return [
                    Button::Create("Create Catalog")->ButtonType(function () {
                        return 'primary';
                    })->ModalUrl(function ($button) {
                        return route('admin.catalog-form');
                    })->ModalTitle('Create Catalog')
                ];
            })
            ->ButtonInTable(function () {
                return [
                    Button::Create("Edit")->ButtonType(function () {
                        return 'info';
                    })->ModalUrl(function ($button) {
                        return route('admin.catalog-form', ['dataId' => $button->getData()->id]);
                    })->ModalTitle('Edit Page'),
                    Button::Create("Remove")->ButtonType(function () {
                        return 'warning';
                    })->ConfirmTitle("Remove Page")->Confirm("Sure you wanna delete?")->WireClick(function ($button) {
                        $item = $button->getData();
                        return "callDoAction('deleteRow',{'id':" . $item->id . "})";
                    }),
                ];
            })
            ->Item($this->GetFields())
            ->Action('changeStatus', function ($params, $compoent) {
                ['id' => $id, 'status' => $status] = $params;
                ($this->GetModel())::where('id', $id)->update(['status' => $status]);
            })->Action('deleteRow', function ($params, $compoent) {
                ['id' => $id] = $params;
                ($this->GetModel())::where('id', $id)->delete();
                $compoent->showMessage("Delete record successfully.");
            });
    }
    public function FormPage()
    {
        return ItemManager::Form()
            ->Model($this->GetModel())
            ->BeforeSave(function ($model) {
                $model->author_id = auth()->user()->id;
                return $model;
            })
            ->Title('Role Form')
            ->Message(function ($manager) {
                if ($manager->getData()->getDataId() > 0) {
                    return 'Update Catalog success';
                }
                return 'Create Catalog success';
            })
            ->Item($this->GetFields());
    }
    public function SetupFormCustom()
    {
        // $this->FormCustom('permission', function () {
        //     return ItemManager::Form()
        //         ->Model($this->GetModel())->Item([
        //             Item::Add('name')->Title('Name')->Column(Item::Col12)->Type('readonly'),
        //             Item::Add('PermissionIds')->Title('Permissions')->Column(Item::Col12)->Type('toggle-multiple')->DataOption(function () {
        //                 return \Sokeio\Models\Permission::all()->map(function ($item) {
        //                     return [
        //                         'value' => $item->id,
        //                         'text' => $item->name
        //                     ];
        //                 });
        //             })
        //         ])->FormDoSave(function ($params, $component, $manager) {
        //             $role = Role::find($component->dataId);
        //             $role->permissions()->sync(collect($component->form->PermissionIds)->filter(function ($item) {
        //                 return $item > 0;
        //             })->toArray());
        //             $component->showMessage("Update permission of role success");
        //             $component->closeComponent();
        //             $component->refreshRefComponent();
        //         });
        // });
    }
}
