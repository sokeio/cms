<?php

namespace Sokeio\Cms\Models;

use Sokeio\Cms\Traits\WithComments;
use Sokeio\Model;
use Sokeio\Concerns\WithModelTranslatable;

class Catalog extends Model
{
    use WithModelTranslatable, WithComments;

    public $translatedAttributes = [
        'catalog_id',
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
