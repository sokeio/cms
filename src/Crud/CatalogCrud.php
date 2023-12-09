<?php

namespace  Sokeio\Cms\Crud;

use Sokeio\Cms\Models\Catalog;
use Sokeio\Admin\Button;
use Sokeio\Admin\CrudManager;
use Sokeio\Admin\Item;
use Sokeio\Admin\ItemManager;

class CatalogCrud extends CrudManager
{
    public function GetModel()
    {
        return Catalog::class;
    }
    public function GetFields()
    {
        return [
            Item::Add('id')
                ->Title('ID')
                ->DisableFilter()
                ->DisableSort()
                ->When(function ($item, $manager) {
                    return $manager->IsTable();
                })
                ->DisableEdit(),
            Item::Add('name')
                ->Column(Item::Col12)
                ->Title('Name')->Required()->ValueDefault(function () {
                    return '';
                }),
            Item::Add('slug')
                ->Title('Slug')
                ->When(function ($item, $manager) {
                    return $manager->IsTable();
                })->DisableEdit()->ValueDefault(function () {
                    return '';
                }),
            Item::Add('description')
                ->Title('Description')
                ->Type('textarea')
                ->Column(Item::Col12)
                ->When(function ($item, $manager) {
                    return !$manager->IsTable();
                })->ValueDefault(function () {
                    return '';
                }),
            Item::Add('status')
                ->Title('Status')
                ->DataOptionStatus()
                ->DataText(function (Item $item) {
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
                })
                ->DisableEdit(function ($item, $manager) {
                    return !$manager->IsTable();
                })->ValueDefault(function ($item, $manager) {
                    if (!$manager->IsTable()) {
                        return 1;
                    }
                    return null;
                }),
        ];
    }

    public function TablePage()
    {
        return ItemManager::Table()
            ->Item($this->GetFields())
            ->Model($this->GetModel())
            ->BeforeQuery(function ($query) {
                return $query->with('translations');
            })
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
            });
    }
    public function FormPage()
    {
        return ItemManager::Form()
            ->Item($this->GetFields())
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
            });
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
