<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table= 'vehicle';


    protected $fillable = [
        'id_vehicle','brand','model','vehicle_code','entry_date',
        'vehicle_type_id_vehicle_type'
    ];

    protected $primaryKey = 'id_vehicle';
}
