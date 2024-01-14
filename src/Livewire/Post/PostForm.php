<?php

namespace Sokeio\Cms\Livewire\Post;

use Sokeio\Components\Form;
use Sokeio\Components\UI;
use Sokeio\Breadcrumb;
use Sokeio\Cms\Models\Catalog;
use Sokeio\Cms\Models\Post;
use Sokeio\Cms\Models\Tag;

use function PHPUnit\Framework\returnSelf;

class PostForm extends Form
{
    public $categoryIds = [];
    public $tagIds = '';
    public function getTitle()
    {
        return __('Post');
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
        return Post::class;
    }
    protected function loadDataAfter($post)
    {
        $this->categoryIds = $post->catalogs()->get()->map(function ($item) {
            return $item->id;
        })->toArray();
        $this->tagIds = json_encode($post->tags()->get()->map(function ($item) {
            return [
                'value' => $item->name,
                'id' => $item->id
            ];
        })->toArray());
    }
    protected function saveAfter($post)
    {
        $tagIds = collect(json_decode($this->tagIds, true))->map(function ($item) {
            if (isset($item['id'])) {
                return $item['id'];
            }

            $tag = Tag::create([
                'name' => is_string($item) ? $item : $item['value'],
                'author_id' => auth()->user()->id
            ]);
            $tag->save();
            return $tag->id;
        });

        $post->tags()->sync(
            collect($tagIds)
                ->filter(function ($item) {
                    return $item > 0;
                })
                ->toArray()
        );

        $post->catalogs()->sync(
            collect($this->categoryIds)
                ->filter(function ($item) {
                    return $item > 0;
                })
                ->toArray()
        );
    }
    protected function FooterUI()
    {
        return null;
    }
    public function TagSearch($keyword)
    {
        return Tag::where('name', 'like', '%' . $keyword . '%')->get()->map(function ($item) {
            return ['value' => $item->name, 'id' => $item->id];
        });
    }
    public function FormUI()
    {
        return UI::Container([
            UI::Prex(
                'data',
                [
                    UI::Hidden('author_id')->ValueDefault(auth()->user()->id),
                    UI::Row([
                        UI::Column8([
                            UI::Text('name')->Label(__('Title'))->required(),
                            UI::Text('slug')->Label(__('Slug')),
                            UI::Tinymce('content')->Label(__('Content'))->required(),
                            UI::Textarea('description')->Label(__('Description')),
                            UI::Textarea('custom_js')->Label(__('Custom Js')),
                            UI::Textarea('custom_css')->Label(__('Custom CSS')),
                        ]),
                        UI::Column4([
                            UI::Select('status')->Label(__('Status'))->DataSource(function () {
                                return [
                                    [
                                        'id' => 'draft',
                                        'name' => __('Draft')
                                    ],
                                    [
                                        'id' => 'published',
                                        'name' => __('Published')
                                    ]
                                ];
                            })->ValueDefault('published'),
                            UI::Image('image')->Label(__('Image')),
                            UI::CheckboxMutil('categoryIds')->Prex('')->Label(__('Category'))->DataSource(function () {
                                return Catalog::query()->where('status', 'published')->get();
                            })->NoSave(),
                            UI::Tagify('tagIds')->Prex('')->Label(__('Tags'))->FieldOption(function () {
                                return [
                                    'whitelistAction' => 'TagSearch',
                                    'searchKeys' => ["name"]
                                ];
                            })->NoSave(),
                            UI::Select('layout')->Label(__('Layout'))->DataSource(function () {
                                return [
                                    [
                                        'id' => 'default',
                                        'name' => __('Default')
                                    ],
                                    [
                                        'id' => 'none',
                                        'name' => __('None')
                                    ],
                                ];
                            }),
                            UI::Button(__('Save article'))->WireClick('doSave()')->ClassName('w-100 mb-2'),
                        ]),
                    ]),
                ]
            )
        ])
            ->ClassName('p-3');
    }
}
