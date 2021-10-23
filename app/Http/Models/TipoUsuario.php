<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table= 'user_type';


    protected $fillable = [
        'descripcion'
    ];

    protected $primaryKey = 'id_user_type';
}
