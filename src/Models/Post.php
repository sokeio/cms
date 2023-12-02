<?php

namespace Sokeio\Blog\Models;

use Sokeio\Blog\Traits\WithComments;
use Sokeio\Blog\Traits\WithTranslation;
use Sokeio\Concerns\WithSlug;
use Illuminate\Database\Eloquent\Model;
use Sokeio\Concerns\WithModelTranslatable;

class Post extends Model
{
    use WithModelTranslatable, WithComments, WithTranslation;
}
