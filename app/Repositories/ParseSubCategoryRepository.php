<?php

namespace App\Repositories;

use LaraParse\Repositories\AbstractParseRepository;
use App\Repositories\Contracts\SubCategoryRepository;

class ParseSubCategoryRepository extends ParseBaseRepository implements SubCategoryRepository
{

    /**
     * Specify Parse Class name
     *
     * @return string
     */
    public function getParseClass()
    {
        return 'SubCategory';
    }
}
