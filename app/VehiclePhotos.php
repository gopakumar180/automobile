<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiclePhotos extends Model
{
    protected $fillable=['vehicle_id','url'];
    protected $table="vehicle_photos";
}
