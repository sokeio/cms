<?php

namespace Sokeio\Blog\Models;

use Sokeio\Blog\Traits\WithComments;
use Sokeio\Blog\Traits\WithTranslation;
use Sokeio\Traits\WithSlug;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use WithSlug, WithComments,WithTranslation;
}
