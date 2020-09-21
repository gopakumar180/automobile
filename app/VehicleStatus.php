<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleStatus extends Model
{
    protected $fillable=['status'];
    protected $table="vehicle_status";//
}
