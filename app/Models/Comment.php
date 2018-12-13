<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_id', 'film_id'
    ];

    /**
     * Get the user that post the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the film for which the comment is intended
     */
    public function film()
    {
        return $this->belongsTo('App\Models\Film');
    }
}
