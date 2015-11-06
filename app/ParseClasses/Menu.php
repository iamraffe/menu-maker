<?php

namespace App\ParseClasses;

use LaraParse\Traits\CastsParseProperties;
use Parse\ParseObject;
use Parse\ParseQuery;

/**
 * Class Menu
 *
 * @package LaraParse
 */
class Menu extends ParseObject
{
    use CastsParseProperties;

    public static $parseClassName = 'Menu';

    
}