<?php

namespace Sokeio\Cms\Models;

use Sokeio\Cms\Traits\WithComments;
use Sokeio\Concerns\WithSlug;
use Illuminate\Database\Eloquent\Model;
use Sokeio\Seo\HasSEO;

class Tag extends Model
{
    use WithSlug, WithComments;
    use HasSEO;

    public function getSeoCanonicalUrl()
    {
        return route('tag.slug', ['tag' => $this->slug]);
    }
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
