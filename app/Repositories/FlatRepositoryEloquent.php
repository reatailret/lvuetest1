<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FlatRepository;
use App\Models\Flat;
use App\Validators\FlatValidator;

/**
 * Class FlatRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FlatRepositoryEloquent extends BaseRepository implements FlatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Flat::class;
    }

    protected $fieldSearchable = [
        'name'=>'like',
        'bedrooms',
        'bathrooms',
        'garages',
        'storeys',
        'price'=>'between'

    ];

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
