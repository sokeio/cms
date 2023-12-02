<?php

namespace Sokeio\Blog\Models;

use Sokeio\Blog\Traits\WithComments;
use Sokeio\Blog\Traits\WithTranslation;
use Illuminate\Database\Eloquent\Model;
use Sokeio\Concerns\WithModelTranslatable;

class Catalog extends Model
{
    use WithModelTranslatable, WithComments, WithTranslation;
}
