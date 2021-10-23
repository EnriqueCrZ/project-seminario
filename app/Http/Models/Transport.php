<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $table= 'transport';


    protected $fillable = [
        'id_transport','movement_correlative','movemente_type','location','authorization_number',
        'date','vehicle_id_vehicle','user_id_user'
    ];

    protected $primaryKey = 'id_transport';
}
