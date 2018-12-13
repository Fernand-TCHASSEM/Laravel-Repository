<?php

namespace App\Repositories;

use Log;
use App\Models\Comment;
use App\Bases\Traits\BaseRepository;

class CommentRepository
{

    use BaseRepository;

    function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    public function store($arg)
    {
        $comment = $this->create($arg);

        return $comment;
    }

    public function retrieve($filmId)
    {
        return Comment::with(['user:id,name', 'film:id,name'])->where('film_id', $filmId)->get();
    }

}
