<?php

namespace App\Repositories;

use LaraParse\Repositories\AbstractParseRepository;
use App\Repositories\Contracts\ItemRepository;

class ParseItemRepository extends AbstractParseRepository implements ItemRepository
{

    /**
     * Specify Parse Class name
     *
     * @return string
     */
    public function getParseClass()
    {
        return 'Item';
    }
}
