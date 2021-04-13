<?php

namespace App\Http\Controllers;

use App\Repositories\FlatRepository;
use App\Validators\FlatValidator;

/**
 * Class FlatsController.
 *
 * @package namespace App\Http\Controllers;
 */
class FlatsController extends Controller
{
    /**
     * @var FlatRepository
     */
    protected $repository;

    /**
     * FlatsController constructor.
     *
     * @param FlatRepository $repository
     * @param FlatValidator $validator
     */
    public function __construct(FlatRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $flats = $this->repository->all();

        return response()->json(
            $flats,
        );
    }
}
