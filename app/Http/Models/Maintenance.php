<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table= 'maintenance';


    protected $fillable = [
        'id_maintenance','service_number','service_date','service_responsable','vehicle_id',
        'user_id_user','maintenance_type_id_maintenance'
    ];

    protected $primaryKey = 'id_maintenance';
}
