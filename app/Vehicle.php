<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'power', 'km', 'registration', 'color', 'short_description', 'description', 'active', 'priority',
        'price', 'pattern_id', 'patent_id', 'vehicle_type_id', 'emission_regulation_id', 'traction_id', 'combustible_id', 'gearshift_id'
    ];

    public function pattern()
    {
        return $this->belongsTo(Pattern::class);
    }

    public function patent()
    {
        return $this->belongsTo(Patent::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function emissionRegulation()
    {
        return $this->belongsTo(EmissionRegulation::class);
    }

    public function traction()
    {
        return $this->belongsTo(Traction::class);
    }

    public function combustible()
    {
        return $this->belongsTo(Combustible::class);
    }

    public function gearshift()
    {
        return $this->belongsTo(Gearshift::class);
    }
}