<?php

namespace Sokeio\CMS\Support\Shortcode;

use Attribute;
use Sokeio\Concerns\WithAttribute;

#[Attribute(Attribute::TARGET_CLASS)]
class ShortcodeInfo
{
    use WithAttribute;

    public function __construct(
        public $key,
        public $name = '',
        public $icon = null,
        public $stripTags = false
    ) {}
}
