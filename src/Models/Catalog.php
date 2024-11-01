<?php

namespace Sokeio\CMS\Models;

use Sokeio\Model;

class Catalog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active',
        'template',
        'custom_js',
        'custom_css',
        'created_by',
        'updated_by',
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_catalogs', 'catalog_id', 'post_id');
    }
}
