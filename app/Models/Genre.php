<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Bases\Traits\ShareScope;

class Genre extends Model
{

    use ShareScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label'
    ];
    
}
