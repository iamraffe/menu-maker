<?php

namespace App\Repositories\Contracts;

use LaraParse\Repositories\Contracts\ParseRepository;

/**
 * Class Item
 *
 * @method \{{rootNamespace}}ParseClasses\Item[] all()
 * @method \{{rootNamespace}}ParseClasses\Item[] paginate($perPage = 1);
 * @method \{{rootNamespace}}ParseClasses\Item   create(array $data)
 * @method \{{rootNamespace}}ParseClasses\Item   update($id, array $data)
 * @method \{{rootNamespace}}ParseClasses\Item   delete($id)
 * @method \{{rootNamespace}}ParseClasses\Item   find($id)
 * @method \{{rootNamespace}}ParseClasses\Item   findBy($field, $value)
 * @method \{{rootNamespace}}ParseClasses\Item[] near($column, $latitude, $longitude, $limit = 10)
 * @method \{{rootNamespace}}ParseClasses\Item[] within($column, $latitude, $longitude, $distance)
 * @method \{{rootNamespace}}ParseClasses\Item[] withinBox($column, $swLatitude, $swLongitude, $neLatitude, $neLongitude)
 */
interface ItemRepository extends ParseRepository
{
    //
}
