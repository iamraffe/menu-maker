<?php

namespace App\Repositories\Contracts;

use LaraParse\Repositories\Contracts\ParseRepository;

/**
 * Class Category
 *
 * @method \{{rootNamespace}}ParseClasses\Category[] all()
 * @method \{{rootNamespace}}ParseClasses\Category[] paginate($perPage = 1);
 * @method \{{rootNamespace}}ParseClasses\Category   create(array $data)
 * @method \{{rootNamespace}}ParseClasses\Category   update($id, array $data)
 * @method \{{rootNamespace}}ParseClasses\Category   delete($id)
 * @method \{{rootNamespace}}ParseClasses\Category   find($id)
 * @method \{{rootNamespace}}ParseClasses\Category   findBy($field, $value)
 * @method \{{rootNamespace}}ParseClasses\Category[] near($column, $latitude, $longitude, $limit = 10)
 * @method \{{rootNamespace}}ParseClasses\Category[] within($column, $latitude, $longitude, $distance)
 * @method \{{rootNamespace}}ParseClasses\Category[] withinBox($column, $swLatitude, $swLongitude, $neLatitude, $neLongitude)
 */
interface CategoryRepository extends ParseRepository
{
    //
}
