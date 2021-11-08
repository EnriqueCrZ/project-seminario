<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model{

    protected $table= 'pilot';
    public $timestamps = false;

    protected $fillable = [
        'id_pilot','complete_name','license','phone_number','address',
    ];

    protected $primaryKey = 'id_pilot';
}
