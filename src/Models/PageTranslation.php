<?php

namespace Sokeio\Cms\Models;

use Sokeio\Concerns\WithSlug;
use Sokeio\Model;

class PageTranslation extends Model
{
    use WithSlug;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable =  [
        'page_id',
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
