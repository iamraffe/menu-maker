<?php

namespace App\Repositories;

use LaraParse\Repositories\AbstractParseRepository;
use App\Repositories\Contracts\CategoryRepository;

class ParseCategoryRepository extends AbstractParseRepository implements CategoryRepository
{

    /**
     * Specify Parse Class name
     *
     * @return string
     */
    public function getParseClass()
    {
        return 'Category';
    }
}
