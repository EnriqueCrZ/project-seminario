<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table= 'vehicle_type';
    public $timestamps = false;


    protected $fillable = [
        'id_vehicle_type','vehicle_type'
    ];

    protected $primaryKey = 'id_vehicle_type';
}
