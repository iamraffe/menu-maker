<?php

namespace App\ParseClasses;

use Parse\ParseObject;
use LaraParse\Traits\CastsParseProperties;

/**
 * Class Archive
 *
 * @package LaraParse
 */
class Archive extends ParseObject
{
    use CastsParseProperties;

    public static $parseClassName = 'Archive';
}