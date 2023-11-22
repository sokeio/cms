<?php

namespace Sokeio\Blog\Models;

use Sokeio\Blog\Traits\WithComments;
use Sokeio\Blog\Traits\WithTranslation;
use Sokeio\Concerns\WithSlug;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use WithSlug, WithComments,WithTranslation;
}
