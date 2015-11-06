<?php

namespace App\ParseClasses;

use Parse\ParseObject;
use LaraParse\Traits\CastsParseProperties;

/**
 * Class SubCategory
 *
 * @package LaraParse
 */
class SubCategory extends ParseObject
{
    use CastsParseProperties;

    public static $parseClassName = 'SubCategory';
}