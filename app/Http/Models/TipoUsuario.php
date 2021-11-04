<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table= 'user_type';


    protected $fillable = [
        ',id_user_type','descripcion'
    ];

    protected $primaryKey = 'id_user_type';
}
