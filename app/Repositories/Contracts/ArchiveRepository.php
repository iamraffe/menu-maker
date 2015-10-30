<?php

namespace App\Repositories\Contracts;

use LaraParse\Repositories\Contracts\ParseRepository;

/**
 * Class Archive
 *
 * @method \{{rootNamespace}}ParseClasses\Archive[] all()
 * @method \{{rootNamespace}}ParseClasses\Archive[] paginate($perPage = 1);
 * @method \{{rootNamespace}}ParseClasses\Archive   create(array $data)
 * @method \{{rootNamespace}}ParseClasses\Archive   update($id, array $data)
 * @method \{{rootNamespace}}ParseClasses\Archive   delete($id)
 * @method \{{rootNamespace}}ParseClasses\Archive   find($id)
 * @method \{{rootNamespace}}ParseClasses\Archive   findBy($field, $value)
 * @method \{{rootNamespace}}ParseClasses\Archive[] near($column, $latitude, $longitude, $limit = 10)
 * @method \{{rootNamespace}}ParseClasses\Archive[] within($column, $latitude, $longitude, $distance)
 * @method \{{rootNamespace}}ParseClasses\Archive[] withinBox($column, $swLatitude, $swLongitude, $neLatitude, $neLongitude)
 */
interface ArchiveRepository extends ParseRepository
{
    //
}
