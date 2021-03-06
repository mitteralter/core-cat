<?php

namespace App\JsonApi\Facs;


use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;

class Adapter extends AbstractAdapter
{

    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */


    protected $filleable = [  'name' => 'name',];
    protected $attributes = [  'name' => 'name',];

    /**
     * Mapping of JSON API filter names to model scopes.
     *
     * @var array
     */
    protected $filterScopes = [];

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        // parent::__construct(new \App\Fac(), $paging);
        parent::__construct(new \App\Models\Fac(), $paging);
    }

    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
        $this->filterWithScopes($query, $filters);
    }

    protected function Facs()
    {
        return $this;
    }

}
