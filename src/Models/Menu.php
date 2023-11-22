<?php

namespace Sokeio\Blog\Models;

use Sokeio\Blog\Traits\WithTranslation;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;
    use  WithTranslation;
}
