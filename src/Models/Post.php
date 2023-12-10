<?php

namespace Sokeio\Cms\Models;

use Sokeio\Cms\Traits\WithComments;
use Sokeio\Cms\Traits\WithTranslation;
use Illuminate\Database\Eloquent\Model;
use Sokeio\Concerns\WithModelTranslatable;

class Post extends Model
{
    use WithModelTranslatable, WithComments, WithTranslation;
}
