<?php

namespace App\ParseClasses;

use Parse\ParseObject;
use LaraParse\Traits\CastsParseProperties;

/**
 * Class Category
 *
 * @package LaraParse
 */
class Category extends ParseObject
{
    use CastsParseProperties;

    public static $parseClassName = 'Category';
}