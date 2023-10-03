<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Car;


class Mechanic extends Model
{
    /**
     * Get the car's owner.
     */
    protected $table = "mechanics";
    protected $primaryKey = "mechanic_id";
    public function carOwner()
    {
        return $this->hasOneThrough(
            Owner::class,
            Car::class,
            'mechanic_id', 
            'car_id', 
            'mechanic_id', 
            'car_id'
        );
    }
    public function many()
    {
        return $this->hasManyThrough(
            Owner::class, Car::class,
            'mechanic_id', 
            'car_id', 
            'mechanic_id', 
            'car_id');
    }
}
