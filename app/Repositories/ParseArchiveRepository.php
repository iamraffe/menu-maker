<?php

namespace App\Repositories;

use App\Repositories\Contracts\ArchiveRepository;
use App\Repositories\ParseBaseRepository;
use LaraParse\Repositories\AbstractParseRepository;

class ParseArchiveRepository extends ParseBaseRepository implements ArchiveRepository
{

    /**
     * Specify Parse Class name
     *
     * @return string
     */
    public function getParseClass()
    {
        return 'Archive';
    }
}
