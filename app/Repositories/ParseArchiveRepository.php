<?php

namespace App\Repositories;

use LaraParse\Repositories\AbstractParseRepository;
use App\Repositories\Contracts\ArchiveRepository;

class ParseArchiveRepository extends AbstractParseRepository implements ArchiveRepository
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
