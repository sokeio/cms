<?php

namespace Sokeio\CMS\Models;

use Sokeio\Model;

class Tag extends Model
{

    public function getSeoCanonicalUrl()
    {
        return route('tag.slug', ['tag' => $this->slug]);
    }
    protected $fillable = [
        'title',
        'description',
        'image',
        'views',
        'status',
        'author_id',
        'updated_at',
        'created_at'
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
}
