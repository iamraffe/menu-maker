<?php

namespace App\Repositories;

use LaraParse\Repositories\AbstractParseRepository;
use App\Repositories\Contracts\MenuRepository;

class ParseMenuRepository extends AbstractParseRepository implements MenuRepository
{

    /**
     * Specify Parse Class name
     *
     * @return string
     */
    public function getParseClass()
    {
        return 'Menu';
    }
}
