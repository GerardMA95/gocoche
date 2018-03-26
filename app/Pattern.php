<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'places', 'door', 'patent_id'
    ];


    public function patent()
    {
        return $this->belongsTo(Patent::class);
    }
}