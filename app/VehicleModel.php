<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    protected $fillable=['company_id','title'];
    protected $table="vehicle_models";
}
