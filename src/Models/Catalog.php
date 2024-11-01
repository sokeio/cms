<?php

namespace Sokeio\CMS\Models;

use Sokeio\CMS\Concerns\WithLocale;
use Sokeio\Model;

class Catalog extends Model
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
        'image',
        'published',
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
