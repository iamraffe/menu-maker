<?php

namespace App\Repositories;

use App\Repositories\Contracts\ReviewRepository;
use Illuminate\Support\Collection;
use LaraParse\Repositories\AbstractParseRepository;
use Parse\ParseQuery;

abstract class ParseBaseRepository extends AbstractParseRepository
{
    /**
     * @return Collection|ParseObject[]
     */
    public function all($includeKeys = [], $limit = 1000, $ascending = true, $sortKey = 'createdAt')
    {
        $this->query = new ParseQuery($this->getParseClass());
        if($ascending){
            $this->query->ascending($sortKey);
        }
        else{
            $this->query->descending($sortKey);
        }

        if($limit == 1000 && $this->query->count() > 1000){
            return $this->handleThousand($includeKeys);
        }
        else{

            $this->query->limit($limit);

            foreach($includeKeys as $key){
                $this->query->includeKey($key);
            }

            return Collection::make($this->query->find($this->useMasterKey));
        }
    }

    public function matchesQuery($innerQuery, $outerKey, $includeKeys = [], $sortKey = "position")
    {
        foreach($includeKeys as $key){
            $this->query->includeKey($key);
        }

        $this->query->ascending($sortKey);

        $this->query->matchesQuery($outerKey, $innerQuery);
        return Collection::make($this->query->find($this->useMasterKey));
    }

    /**
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return ParseObject
     */
    public function findAllBy($field, $value, $includeKeys = [], $limit = 1000, $ascending = true, $sortKey = 'createdAt')
    {
        $this->query = new ParseQuery($this->getParseClass());
        if($ascending){
            $this->query->ascending($sortKey);
        }
        else{
            $this->query->descending($sortKey);
        }

        $this->query->equalTo($field, $value);

        if($limit == 1000 && $this->query->count() > 1000){
            return $this->handleThousand($includeKeys);
        }
        else{

            $this->query->limit($limit);

            foreach($includeKeys as $key){
                $this->query->includeKey($key);
            }

            return Collection::make($this->query->find($this->useMasterKey));
        }

    }

    public function handleThousand($includeKeys)
    {
        $collection = Collection::make([]);

        for($i = 0; $i < (floor($this->query->count() / 1000))+1; $i++){

            $this->query->limit(1000)->skip(1000*$i);

            foreach($includeKeys as $key){
                $this->query->includeKey($key);
            }

            $collection->push($this->query->find($this->useMasterKey));
        }
        return $collection->flatten();
    }

    /**
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return ParseObject
     */
    public function findBy($field, $value, $includeKeys = [], $columns = ['*'])
    {
        foreach($includeKeys as $key){
            $this->query->includeKey($key);
        }

        $this->query->equalTo($field, $value);

        return $this->query->first($this->useMasterKey);
    }

    public function count()
    {
        return $this->query->count();
    }
}
