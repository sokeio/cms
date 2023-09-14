<?php

namespace  BytePlatform\Cms\Crud;

use BytePlatform\Button;
use BytePlatform\Cms\Models\Catalog;
use BytePlatform\Cms\Models\Post;
use BytePlatform\CrudManager;
use BytePlatform\Item;
use BytePlatform\ItemManager;
use Illuminate\Support\Facades\Log;

class PostCrud extends CrudManager
{
    public function GetModel()
    {
        return Post::class;
    }
    public function GetFields()
    {
        return [
            Item::Add('id')->Title('ID')
                ->DisableFilter()
                ->DisableSort()
                ->NoBindData()
                ->When(function ($item, $manager) {
                    return $manager->IsTable();
                })->DisableEdit(),
            Item::Add('name')
                ->Layout('column1')
                ->Column(Item::Col12)
                ->Title('Title')->Required(),
            Item::Add('slug')
                ->Title('Slug')
                ->When(function ($item, $manager) {
                    return $manager->IsTable();
                })->DisableEdit(),
            Item::Add('content')
                ->Layout('column1')
                ->Title('Content')
                ->Type('tinymce')
                ->Column(Item::Col12)
                ->Required()
                ->When(function ($item, $manager) {
                    return !$manager->IsTable();
                }),
            Item::Add('published_at')
                ->Column(Item::Col12)
                ->Title('Published At')
                ->Type('flatpickr')
                ->ValueDefault(function () {
                    return now();
                })
                ->When(function ($item, $manager) {
                    return !$manager->IsTable();
                }),
            Item::Add('description')
                ->Column(Item::Col12)
                ->Title('Description')
                ->Type('textarea')
                ->When(function ($item, $manager) {
                    return !$manager->IsTable();
                }),
            Item::Add('tags')
                ->Column(Item::Col12)
                ->Title('Tags')
                ->Type('tagify')
                ->NoBindData()
                ->When(function ($item, $manager) {
                    return !$manager->IsTable();
                }),
            Item::Add('is_featured')
                ->Column(Item::Col12)
                ->Title('Is Featured')
                ->Type('toggle')
                ->ValueDefault(0)
                ->DataOption(function () {
                    return [
                        'value' => 1,
                        'text' => ''
                    ];
                })->When(function ($item, $manager) {
                    return !$manager->IsTable();
                }),
            Item::Add('status')
                ->Column(Item::Col12)
                ->Title('Status')
                ->DataOptionStatus()
                ->ValueDefault(0)
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
                })->DisableEdit(function ($item, $manager) {
                    return !$manager->IsTable();
                }),

            Item::Add('categorie_ids')
                ->Column(Item::Col12)
                ->Type('select')
                ->Title('Categories')
                ->NoBindData()
                ->DataOption(function () {
                    return Catalog::all()->map(function ($item) {
                        return [
                            'value' => $item->id,
                            'text' => $item->name
                        ];
                    });
                })->DataOptionNone()->When(function ($item, $manager) {
                    return !$manager->IsTable();
                }),
            Item::Add('image')
                ->Column(Item::Col12)
                ->Type('images')
                ->Title('Image Feature')
                ->DataOption(function () {
                    return Catalog::all()->map(function ($item) {
                        return [
                            'value' => $item->id,
                            'text' => $item->name
                        ];
                    });
                })->DataOptionNone()->When(function ($item, $manager) {
                    return !$manager->IsTable();
                }),

        ];
    }

    public function TablePage()
    {
        return ItemManager::Table()
            ->Model($this->GetModel())
            // ->EditInTable()
            ->Title('Post Manager')
            ->Filter()
            ->Sort()
            ->CheckBoxRow()
            ->ButtonOnPage(function () {
                return [
                    Button::Create("Create Post")->ButtonType(function () {
                        return 'primary';
                    })
                        // ->ButtonLink(function () {
                        //     return route('admin.post-form');
                        // })
                        ->ModalUrl(function ($button) {
                            return route('admin.post-form');
                        })->ModalTitle('Create Post')->ModalSize('modal-fullscreen-xl-down modal-xl')
                ];
            })
            ->ButtonInTable(function () {
                return [
                    Button::Create("Edit")->ButtonType(function () {
                        return 'info';
                    })->ModalUrl(function ($button) {
                        return route('admin.post-form', ['dataId' => $button->getData()->id]);
                    })->ModalTitle('Edit Page')->ModalSize('modal-fullscreen-xl-down modal-xl'),
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
            // ->useMethodGet()
            ->Model($this->GetModel())
            ->BeforeSave(function ($model) {
                $model->author_id = auth()->user()->id;
                return $model;
            })
            ->AfterSave(function ($model, $manager) {
                //TODO:TAGS em them luu vao tag he
                Log::info($manager->getData()->tags);
                Log::info($manager->getData()->categorie_ids);

                return $model;
            })
            ->Title('Post Form')
            ->Layout([
                ['key' => 'column1', 'class' => '', 'column' => Item::Col9],
                ['key' => 'column2', 'class' => '', 'column' => Item::Col3]
            ])
            ->LayoutDefault('column2')
            ->Message(function ($manager) {
                if ($manager->getData()->getDataId() > 0) {
                    return 'Update Post success';
                }
                return 'Create Post success';
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
        //                 return \BytePlatform\Models\Permission::all()->map(function ($item) {
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
