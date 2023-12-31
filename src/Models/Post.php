<?php

namespace Sokeio\Cms\Models;

use Sokeio\Cms\Traits\WithComments;
use Illuminate\Database\Eloquent\Model;
use Sokeio\Concerns\WithModelTranslatable;

class Post extends Model
{
    use WithModelTranslatable, WithComments;
    public $translatedAttributes = [
        'post_id',
        'locale',
        'name',
        'slug',
        'description',
        'content',
        'image',
        'views',
        'status',
        'author_id',
        'published_at',
        'lock_password',
        'app_before',
        'app_after',
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
