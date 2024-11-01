<?php

namespace Sokeio\CMS\Models;

use Sokeio\Cms\Concerns\WithLocale;
use Sokeio\Model;

class Page extends Model
{
    use WithLocale;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'main_id',
        'locale',
        'title',
        'description',
        'content',
        'image',
        'status',
        'published_at',
        'password',
        'template',
        'data',
        'data_js',
        'data_css',
        'custom_js',
        'custom_css',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];
}
