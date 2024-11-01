<?php

namespace Sokeio\CMS\Models;

use Sokeio\CMS\Concerns\WithLocale;
use Sokeio\Model;

class Post extends Model
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
        'published',
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
    public function catalogs()
    {
        return $this->belongsToMany(Catalog::class, 'post_catalogs', 'post_id', 'catalog_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
