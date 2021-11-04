<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table= 'user_type';
    public $timestamps = false;


    protected $fillable = [
        ',id_user_type','descripcion'
    ];

    protected $primaryKey = 'id_user_type';
}
