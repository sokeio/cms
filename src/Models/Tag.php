<?php

namespace Sokeio\CMS\Models;

use Sokeio\Model;

class Tag extends Model
{
    protected $fillable = [
        'main_id',
        'locale',
        'title',
        'description',
        'image',
        'published',
        'updated_at',
        'created_at'
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
}
