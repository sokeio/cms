<?php

namespace Sokeio\Cms\Models;

use Sokeio\Cms\Traits\WithComments;
use Illuminate\Database\Eloquent\Model;
use Sokeio\Concerns\WithSlug;
use Sokeio\Seo\HasSEO;

class Page extends Model
{
    use WithSlug, WithComments;
    use HasSEO;
    public function getSeoCanonicalUrl()
    {
        return route('page.slug', ['page' => $this->slug]);
    }
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

    protected $casts = [
        'published_at' => 'date',
    ];
}
