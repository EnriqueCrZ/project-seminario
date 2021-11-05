<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table= 'vehicle';
    public $timestamps = false;

    protected $fillable = [
        'id_vehicle','brand','model','vehicle_code','entry_date',
        'vehicle_type_id_vehicle_type','plate','line','motor','cc'
    ];

    protected $primaryKey = 'id_vehicle';
}
