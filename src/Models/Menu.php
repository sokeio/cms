<?php

namespace Sokeio\Cms\Models;

use Sokeio\Cms\Traits\WithTranslation;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;
    use  WithTranslation;
}
