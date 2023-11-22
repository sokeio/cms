<?php

namespace Sokeio\Sokeio\Models;

use Sokeio\Sokeio\Traits\WithTranslation;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;
    use  WithTranslation;
}
