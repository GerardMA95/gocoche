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
        'name', 'short_name', 'description', 'places', 'doors', 'patent_id', 'vehicle_type_id', 'active'
    ];

    public function patent()
    {
        return $this->belongsTo(Patent::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }
}
