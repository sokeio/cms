<?php

namespace Sokeio\Cms\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait WithComments
{
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
