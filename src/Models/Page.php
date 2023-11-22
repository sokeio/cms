<?php

namespace Sokeio\Cms\Models;

use Sokeio\Cms\Traits\WithComments;
use Sokeio\Cms\Traits\WithTranslation;
use Sokeio\Traits\WithSlug;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use WithSlug, WithComments, WithTranslation;
}
