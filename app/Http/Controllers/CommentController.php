<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extensions\Controllers\Controller;
use App\Repositories\CommentRepository;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $repository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->repository = $commentRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $inputs = $request->all();

        $inputs['user_id'] = Auth::id();

        $comment = $this->repository->store($inputs);

        return response()->json([
            'code' => self::HTTP_CREATED,
            'id' => $comment->id
        ], self::HTTP_CREATED);
    }

    public function show(Request $request, $id)
    {
        $comments = $this->repository->retrieve($id);

        if ($comments !== null) {
            return response()->json([
                'code' => self::HTTP_SUCCESS,
                'items' => $comments
            ]);
        }

        return response()->json([
            'code' => 4003,
            'description' => 'This comment doesn\'t exist.'
        ], self::HTTP_BADREQUEST);
    }
}
