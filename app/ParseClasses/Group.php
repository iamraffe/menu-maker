<?php

namespace App\ParseClasses;

use Parse\ParseObject;
use LaraParse\Traits\CastsParseProperties;

/**
 * Class Group
 *
 * @package LaraParse
 */
class Group extends ParseObject
{
    use CastsParseProperties;

    public static $parseClassName = 'Group';
}