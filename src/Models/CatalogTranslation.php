<?php

namespace Sokeio\Cms\Models;

use Sokeio\Concerns\WithSlug;
use Sokeio\Model;

class CatalogTranslation extends Model
{
    use WithSlug;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable =  [
        'catalog_id',
        'locale',
        'name',
        'slug',
        'description',
        'image',
        'views',
        'status',
        'author_id',
        'icon',
        'order',
        'is_featured',
        'is_default',
        'layout',
        'data',
        'js',
        'css',
        'custom_js',
        'custom_css',
        'updated_at',
        'created_at'
    ];
}
