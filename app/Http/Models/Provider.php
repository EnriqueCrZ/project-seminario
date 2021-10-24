<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table= 'provider';


    protected $fillable = [
        'id_provider','provider_name','provider_address','created_at','updated_at',
        'user_id_user','email','nit','telefono'
    ];

    protected $primaryKey = 'id_provider';
}
