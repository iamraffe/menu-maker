<?php

namespace App\Repositories;

use App\Repositories\Contracts\ItemRepository;
use App\Repositories\ParseBaseRepository;
use LaraParse\Repositories\AbstractParseRepository;

class ParseItemRepository extends ParseBaseRepository implements ItemRepository
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
