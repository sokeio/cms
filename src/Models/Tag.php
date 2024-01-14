<?php

namespace Sokeio\Cms\Models;

use Sokeio\Cms\Traits\WithComments;
use Sokeio\Concerns\WithSlug;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use WithSlug, WithComments;
    protected $fillable = [
        'name',
        'slug',
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
