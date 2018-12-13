<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'release_date', 'rating', 'ticket_price', 'country', 'photo', 'slug'
    ];

    /**
     * Get the comments for the Film.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * The genres that belong to the film.
     */
    public function genres()
    {
        return $this->belongsToMany('App\Models\Genre');
    }
}
