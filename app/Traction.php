<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
}
