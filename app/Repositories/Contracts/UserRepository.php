<?php

namespace App\Repositories\Contracts;

use LaraParse\Repositories\Contracts\ParseRepository;

/**
 * Class User
 *
 * @method \{{rootNamespace}}ParseClasses\User[] all()
 * @method \{{rootNamespace}}ParseClasses\User[] paginate($perPage = 1);
 * @method \{{rootNamespace}}ParseClasses\User   create(array $data)
 * @method \{{rootNamespace}}ParseClasses\User   update($id, array $data)
 * @method \{{rootNamespace}}ParseClasses\User   delete($id)
 * @method \{{rootNamespace}}ParseClasses\User   find($id)
 * @method \{{rootNamespace}}ParseClasses\User   findBy($field, $value)
 * @method \{{rootNamespace}}ParseClasses\User[] near($column, $latitude, $longitude, $limit = 10)
 * @method \{{rootNamespace}}ParseClasses\User[] within($column, $latitude, $longitude, $distance)
 * @method \{{rootNamespace}}ParseClasses\User[] withinBox($column, $swLatitude, $swLongitude, $neLatitude, $neLongitude)
 */
interface UserRepository extends ParseRepository
{
    //
}
