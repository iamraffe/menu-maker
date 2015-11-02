<?php

namespace App\Repositories\Contracts;

use LaraParse\Repositories\Contracts\ParseRepository;

/**
 * Class Menu
 *
 * @method \{{rootNamespace}}ParseClasses\Menu[] all()
 * @method \{{rootNamespace}}ParseClasses\Menu[] paginate($perPage = 1);
 * @method \{{rootNamespace}}ParseClasses\Menu   create(array $data)
 * @method \{{rootNamespace}}ParseClasses\Menu   update($id, array $data)
 * @method \{{rootNamespace}}ParseClasses\Menu   delete($id)
 * @method \{{rootNamespace}}ParseClasses\Menu   find($id)
 * @method \{{rootNamespace}}ParseClasses\Menu   findBy($field, $value)
 * @method \{{rootNamespace}}ParseClasses\Menu[] near($column, $latitude, $longitude, $limit = 10)
 * @method \{{rootNamespace}}ParseClasses\Menu[] within($column, $latitude, $longitude, $distance)
 * @method \{{rootNamespace}}ParseClasses\Menu[] withinBox($column, $swLatitude, $swLongitude, $neLatitude, $neLongitude)
 */
interface MenuRepository extends ParseRepository
{
    //
}
