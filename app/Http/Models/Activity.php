<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table= 'activity';
    public $timestamps = false;

    protected $fillable = [
        'id_activity','description','origin','destiny','pilot_id_pilot',
        'vehicle','platform'
    ];

    protected $primaryKey = 'id_activity';
}
