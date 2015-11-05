<?php

namespace App\Repositories\Contracts;

use LaraParse\Repositories\Contracts\ParseRepository;

/**
 * Class SubCategory
 *
 * @method \{{rootNamespace}}ParseClasses\SubCategory[] all()
 * @method \{{rootNamespace}}ParseClasses\SubCategory[] paginate($perPage = 1);
 * @method \{{rootNamespace}}ParseClasses\SubCategory   create(array $data)
 * @method \{{rootNamespace}}ParseClasses\SubCategory   update($id, array $data)
 * @method \{{rootNamespace}}ParseClasses\SubCategory   delete($id)
 * @method \{{rootNamespace}}ParseClasses\SubCategory   find($id)
 * @method \{{rootNamespace}}ParseClasses\SubCategory   findBy($field, $value)
 * @method \{{rootNamespace}}ParseClasses\SubCategory[] near($column, $latitude, $longitude, $limit = 10)
 * @method \{{rootNamespace}}ParseClasses\SubCategory[] within($column, $latitude, $longitude, $distance)
 * @method \{{rootNamespace}}ParseClasses\SubCategory[] withinBox($column, $swLatitude, $swLongitude, $neLatitude, $neLongitude)
 */
interface SubCategoryRepository extends ParseRepository
{
    //
}
