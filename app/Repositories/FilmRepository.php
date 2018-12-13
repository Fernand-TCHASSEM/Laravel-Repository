<?php

namespace App\Repositories;

use Log;
use App\Models\Film;
use App\Bases\Traits\BaseRepository;

class FilmRepository
{

    use BaseRepository;

    function __construct(Film $film)
    {
        $this->model = $film;
    }

    public function store($arg)
    {

        $arg['slug'] = str_slug($arg['name']);

        $film = $this->create($arg);

        $film->genres()->sync($arg['genres']);

        return $film;
    }

    public function paginate()
    {
        return $this->paginateArrayResults();
    }

    public function retrieve($slug)
    {
        return $this->findOneBy(['slug' => $slug]);
    }

}
