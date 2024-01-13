<?php

namespace Sokeio\Cms\Models;

use Sokeio\Cms\Traits\WithComments;
use Sokeio\Cms\Traits\WithTranslation;
use Sokeio\Concerns\WithSlug;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use WithSlug, WithComments, WithTranslation;
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
}
