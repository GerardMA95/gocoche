<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image_url'
    ];

    public function pattern()
    {
        return $this->hasMany(Pattern::class);
    }

    public function hasPatterns()
    {
        if($this->pattern->isEmpty()) {
            return false;
        }
        return true;
    }

}
