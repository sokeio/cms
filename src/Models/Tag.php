<?php

namespace Sokeio\Sokeio\Models;

use Sokeio\Sokeio\Traits\WithComments;
use Sokeio\Sokeio\Traits\WithTranslation;
use Sokeio\Traits\WithSlug;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use WithSlug, WithComments,WithTranslation;
}
