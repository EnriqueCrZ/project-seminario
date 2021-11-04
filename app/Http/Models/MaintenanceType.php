<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceType extends Model
{
    protected $table= 'maintenance_type';
    public $timestamps = false;


    protected $fillable = [
        'id_maintenance_type','description'
    ];

    protected $primaryKey = 'id_maintenance_type';
}
