<?php

namespace App\ParseClasses;

use Parse\ParseObject;
use LaraParse\Traits\CastsParseProperties;

/**
 * Class Item
 *
 * @package LaraParse
 */
class Item extends ParseObject
{
    use CastsParseProperties;

    public static $parseClassName = 'Item';
}