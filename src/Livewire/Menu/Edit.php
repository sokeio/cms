<?php

namespace Sokeio\Cms\Livewire\Menu;

use Sokeio\Cms\Models\Menu;
use Sokeio\Cms\Models\MenuLocation;
use Sokeio\Component;
use Sokeio\Facades\Theme;

class Edit extends Component
{
    public $menu_name;
    public $menu_locations = [];
    public $menu_lists = [];
    public $locationId;
    public function doSave()
    {
        if ($this->locationId) {
            $location = MenuLocation::find($this->locationId);
        } else {
            $location = new  MenuLocation();
        }
        if (!$this->menu_name) $this->menu_name = "menu none";
        $location->name = $this->menu_name;
        $location->localtions = json_encode($this->menu_locations ?? []);
        $location->save();
        $this->locationId = $location->id;
    }
    public function mount()
    {
        $location = MenuLocation::find($this->locationId);
        if ($location) {
            $this->menu_name = $location->name;
            $this->menu_locations = json_decode($location->localtions);
            $this->menu_lists = Menu::where('menu_location_id', $this->locationId)->get()->toArray();
        }
    }
    private function updateSortMenu($data_list, $items, $parent_id)
    {
        foreach ($items as $item) {

            $value = $item['value'];
            $order = $item['order'];
            if (!isset($data_list[$value]))
                $data_list[$value] = [
                    'order' => $order,
                    'parent_id' => $parent_id
                ];
            if (isset($item['items']) && count($item['items']) > 0) {
                $_items = $item['items'];
                $data_list = $this->updateSortMenu($data_list, $_items, $value);
            }
        }
        return $data_list;
    }
    public function doUpdateSortMenu($items)
    {
        $menu_lists2 = $this->updateSortMenu([], $items, 0);
        $data_list = [];
        foreach ($this->menu_lists as $item) {
            if (isset($menu_lists2[$item['id']])) {
                $data_list[] = [
                    ...$item,
                    ...$menu_lists2[$item['id']]
                ];
            } else {
                $data_list[] = [
                    ...$item
                ];
            }
        }
        $this->menu_lists = $data_list;
        foreach ($this->menu_lists as $item) {
            Menu::where('id', $item['id'])->update([
                'parent_id' => $item['parent_id'],
                'order' => $item['order']
            ]);
        }
        // $this->showMessage(json_encode($this->menu_lists));
        // $this->skipRender();
    }
    public function removeMenu($id)
    {
        $this->menu_lists = collect($this->menu_lists)->where(function ($item) use ($id) {
            return $item['id'] != $id;
        })->toArray();
    }
    public function doAddMenu($data)
    {
        if (!$this->locationId) $this->doSave();
        $menuItem = new Menu();
        $menuItem->menu_location_id = $this->locationId;
        $menuItem->parent_id = 0;
        $menuItem->name = isset($data['name']) ? $data['name'] : '';
        $menuItem->link = isset($data['link']) ? $data['link'] : '';
        $menuItem->class_attr = isset($data['class_attr']) ? $data['class_attr'] : '';
        $menuItem->data_id = isset($data['data_id']) ? $data['data_id'] : '';
        $menuItem->data_component = isset($data['data_component']) ? $data['data_component'] : '';
        $menuItem->data_params = isset($data['data_params']) ? $data['data_params'] : '';
        $menuItem->type = isset($data['type']) ? $data['type'] : '';
        $menuItem->order = 0;
        $menuItem->save();
        $this->menu_lists[] = [
            'id' => $menuItem->id,
            'parent_id' => 0,
            'name' => isset($data['name']) ? $data['name'] : '',
            'link' => isset($data['link']) ? $data['link'] : '',
            'class_attr' => isset($data['class_attr']) ? $data['class_attr'] : '',
            'data_id' => isset($data['data_id']) ? $data['data_id'] : '',
            'data_component' => isset($data['data_component']) ? $data['data_component'] : '',
            'data_params' => isset($data['data_params']) ? $data['data_params'] : '',
            'type' => isset($data['type']) ? $data['type'] : '',
            'order' => 0
        ];
    }
    public function render()
    {
        return view('cms::menu.edit', [
            'locations' => Theme::getLocations()
        ]);
    }
}
