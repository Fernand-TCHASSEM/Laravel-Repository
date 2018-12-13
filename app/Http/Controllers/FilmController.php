<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilmRequest;
use App\Repositories\FilmRepository;
use App\Extensions\Controllers\Controller;

class FilmController extends Controller
{
    private $repository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->repository = $filmRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $films = $this->repository->paginate();

        return response()->json(array_merge([
            'code' => self::HTTP_SUCCESS
        ], $films->toArray()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $inputs = $request->all();
        $film = $this->repository->store($inputs);

        return response()->json([
            'code' => self::HTTP_CREATED,
            'id' => $film->id
        ], self::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $film = $this->repository->retrieve($slug);

        if ($film !== null) {
            return response()->json([
                'code' => self::HTTP_SUCCESS,
                'item' => $film
            ]);
        }

        return response()->json([
            'code' => 4001,
            'description' => 'This film doesn\'t exist.'
        ], self::HTTP_BADREQUEST);
    }

}
