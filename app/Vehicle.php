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
        'name', 'short_name', 'power', 'km', 'enrollment', 'enrollment_date', 'color', 'short_description', 'description', 'active', 'priority', 'highlighted',
        'price', 'price_bought', 'profit', 'margin', 'pattern_id', 'patent_id', 'emission_regulation_id', 'traction_id', 'combustible_id', 'gearshift_id', 'color_id', 'discount_id'
    ];

    public function calculateMargin()
    {
        if($this->price && $this->price_bought) {
            $this->margin = (($this->price * 100 ) / $this->price_bought ) - 100;
            return $this->margin;
        }
        return null;
    }

    public function calculateProfit()
    {
        if($this->price && $this->price_bought) {
            $this->profit = $this->price - $this->price_bought;
            return $this->profit;
        }
        return null;
    }

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

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
