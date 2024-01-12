<?php

namespace Sokeio\Cms\Models;

use Sokeio\Cms\Traits\WithComments;
use Illuminate\Database\Eloquent\Model;
use Sokeio\Concerns\WithSlug;

class Post extends Model
{
    use WithSlug, WithComments;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
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
