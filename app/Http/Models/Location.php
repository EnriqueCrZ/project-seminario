<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model{

    protected $table= 'location';
    public $timestamps = false;

    protected $fillable = [
        'id_location','name','latitude','longitude','user_id'
    ];

    protected $primaryKey = 'id_location';
}
