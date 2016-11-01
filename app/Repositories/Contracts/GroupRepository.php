<?php

namespace App\Repositories\Contracts;

use LaraParse\Repositories\Contracts\ParseRepository;

/**
 * Class Group
 *
 * @method \{{rootNamespace}}ParseClasses\Group[] all()
 * @method \{{rootNamespace}}ParseClasses\Group[] paginate($perPage = 1);
 * @method \{{rootNamespace}}ParseClasses\Group   create(array $data)
 * @method \{{rootNamespace}}ParseClasses\Group   update($id, array $data)
 * @method \{{rootNamespace}}ParseClasses\Group   delete($id)
 * @method \{{rootNamespace}}ParseClasses\Group   find($id)
 * @method \{{rootNamespace}}ParseClasses\Group   findBy($field, $value)
 * @method \{{rootNamespace}}ParseClasses\Group[] near($column, $latitude, $longitude, $limit = 10)
 * @method \{{rootNamespace}}ParseClasses\Group[] within($column, $latitude, $longitude, $distance)
 * @method \{{rootNamespace}}ParseClasses\Group[] withinBox($column, $swLatitude, $swLongitude, $neLatitude, $neLongitude)
 */
interface GroupRepository extends ParseRepository
{
    //
}
