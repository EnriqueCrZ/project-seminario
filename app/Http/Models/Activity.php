<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table= 'activity';

    protected $fillable = [
        'id_activity','description','origin','destiny','pilot_id_pilot',
        'vehicle','platform','crated_at','updated_at','status'
    ];

    protected $primaryKey = 'id_activity';
}
